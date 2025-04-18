<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function index()
    {
        return view('pages.target');
    }

    public function getAll()
    {
        $data = Target::paginate(10);

        if ($data->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Belum ada data targets.',
                'data' => []
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data targets berhasil diambil.',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $target = Target::find($id);

        if (!$target) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
                'data' => null
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data target berhasil diambil.',
            'data' => $target
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'target' => 'required|string',
            'count_target' => 'required|max:255'
        ]);

        $target = Target::create([
            'target' => $request->target,
            'count_target' => $request->count_target,
        ]);

        return response()->json(['success' => true, 'data' => $target]);
    }

    public function put(Request $request, $id)
    {
        $request->validate([
            'target' => 'required|string',
            'count_target' => 'required|max:255'
        ]);

        $target = Target::find($id);

        if (!$target) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!'
            ]);
        }

        $target->update([
            'target' => $request->target,
            'count_target' => $request->count_target,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data target berhasil diperbarui.',
            'data' => $target
        ]);
    }

    public function destroy($id)
    {
        $target = Target::find($id);
        if (!$target) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!']);
        }

        $target->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
