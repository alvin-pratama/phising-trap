<?php

namespace App\Http\Controllers;

use App\Models\PhisingTrapMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhisingTrapModeController extends Controller
{
    /**
     * Menampilkan semua data dengan pagination (index)
     */
    public function index()
    {
        return view('pages.phising-trap-modes'); // Pastikan path sesuai dengan Blade yang digunakan
    }

    /**
     * Mengambil semua data tanpa pagination (getAll)
     */
    public function getAll()
    {
        $data = PhisingTrapMode::paginate(10); // Ambil 10 data per halaman

        if ($data->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Belum ada data phising trap mode.',
                'data' => []
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data phising trap mode berhasil diambil.',
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
            'name' => 'required|string|max:255',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Simpan data baru
        $service = PhisingTrapMode::create([
            'name' => $request->name,
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
        $service = PhisingTrapMode::find($id);

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
