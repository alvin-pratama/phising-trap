<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLinkMaster;
use Illuminate\Support\Facades\Validator;

class ShortLinkMasterController extends Controller
{
    /**
     * Menampilkan semua data dengan pagination (index)
     */
    public function index()
    {
        return view('pages.short-link-services'); // Pastikan path sesuai dengan Blade yang digunakan
    }

    /**
     * Mengambil semua data tanpa pagination (getAll)
     */
    public function getAll()
    {
        $data = ShortLinkMaster::paginate(10); // Ambil 10 data per halaman

        if ($data->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Belum ada data short link services.',
                'data' => []
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data short link services berhasil diambil.',
            'data' => $data
        ]);
    }

    /**
     * Menambahkan data baru (create)
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'service_name' => 'required|string|max:255',
            'func' => 'required|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Simpan data baru
        $service = ShortLinkMaster::create([
            'service_name' => $request->service_name,
            'func' => $request->func,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan!',
            'data' => $service
        ]);
    }

    /**
     * Menghapus data berdasarkan ID (delete)
     */
    public function destroy($id)
    {
        $service = ShortLinkMaster::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
