<?php

namespace App\Http\Controllers;

use App\Models\PhisingTrapMode;
use App\Models\ShortLinkMaster;
use App\Models\Target;
use App\Models\TrapingUrl;
use App\Models\TrapingUrlMonitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrapingUrlMonitoringController extends Controller
{
    public function index($target_id)
    {
        $ptm = PhisingTrapMode::where('path', '!=', '-')->get();
        $target = Target::find($target_id);
        $tum = TrapingUrlMonitoring::where('target_id', $target_id)->get();
        return view('pages.traping-urls-monitoring', compact('ptm', 'target_id', 'target', 'tum')); // Pastikan path sesuai dengan Blade yang digunakan
    }

    public function getAll($target_id)
    {
        $data = TrapingUrlMonitoring::where('target_id', $target_id)->paginate(10); // Ambil 10 data per halaman

        if ($data->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Belum ada data traping urls.',
                'data' => []
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data traping urls berhasil diambil.',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'target_id' => 'required|string|max:255',
            // 'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_link_service_id' => 'required|exists:short_link_service,id',
            'url_source' => 'required|url',
            'url_custom' => 'required|url',
        ]);

        $shortenedUrl = null;

        if ($request->short_link_service_id == 1) {
            // 🔹 Ambil layanan short link berdasarkan `short_link_service_id`
            $shortLinkService = ShortLinkMaster::find($request->short_link_service_id);

            if (!$shortLinkService) {
                return response()->json(['success' => false, 'message' => 'Short link service tidak ditemukan!']);
            }

            // 🔹 Jalankan fungsi yang sudah Anda miliki (Misal: Bitly::shorten)
            $shortenedUrl = call_user_func($shortLinkService->func, $request->url_source);

            if (!$shortenedUrl) {
                return response()->json(['success' => false, 'message' => 'Gagal membuat short URL!']);
            }
        }

        if ($request->short_link_service_id == 2) {
            $shortenedUrl = $this->generateShortURL($request->url_custom);
        }

        // 🔹 Simpan data ke database
        $trapingUrl = TrapingUrlMonitoring::create([
            'target_id' => $request->target_id,
            'title' => '-',
            'description' => $request->description,
            'short_link_service_id' => $request->short_link_service_id,
            'phising_trap_mode_id' => $request->phising_trap_mode_id,
            'url_source' => $request->url_source,
            'url_custom' => $request->url_custom, // URL hasil pemendekan
            'url_short' => $shortenedUrl,
            'count_access' => 0,
            'count_form_access' => in_array($request->phising_trap_mode_id, [2, 5, 7]) ? 0 : '-',
        ]);

        return response()->json(['success' => true, 'data' => $trapingUrl]);
    }

    public function destroy($id)
    {
        $trapingUrl = TrapingUrlMonitoring::find($id);
        if (!$trapingUrl) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!']);
        }

        $trapingUrl->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }

    function generateShortURL($longUrl)
    {
        $response = Http::get("https://tinyurl.com/api-create.php", [
            'url' => $longUrl
        ]);

        if ($response->successful()) {
            return $response->body(); // Mengembalikan URL pendek
        }

        return null; // Jika gagal
    }
}
