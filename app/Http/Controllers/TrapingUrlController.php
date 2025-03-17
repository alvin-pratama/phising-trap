<?php

namespace App\Http\Controllers;

use App\Models\PhisingTrapMode;
use App\Models\ShortLinkMaster;
use App\Models\TrapingUrl;
use Illuminate\Http\Request;

class TrapingUrlController extends Controller
{
    public function index()
    {
        $ptm = PhisingTrapMode::get();
        return view('pages.traping-urls', compact('ptm')); // Pastikan path sesuai dengan Blade yang digunakan
    }

    public function getAll()
    {
        $data = TrapingUrl::paginate(10); // Ambil 10 data per halaman

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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_link_service_id' => 'required|exists:short_link_service,id',
            'url_source' => 'required|url',
        ]);

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

        // 🔹 Simpan data ke database
        $trapingUrl = TrapingUrl::create([
            'title' => $request->title,
            'description' => $request->description,
            'short_link_service_id' => $request->short_link_service_id,
            'phising_trap_mode_id' => $request->phising_trap_mode_id,
            'url_source' => $request->url_source,
            'url_custom' => $shortenedUrl // URL hasil pemendekan
        ]);

        return response()->json(['success' => true, 'data' => $trapingUrl]);
    }

    public function destroy($id)
    {
        $trapingUrl = TrapingUrl::find($id);
        if (!$trapingUrl) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!']);
        }

        $trapingUrl->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
