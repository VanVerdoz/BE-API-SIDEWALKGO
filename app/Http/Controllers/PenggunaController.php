<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pengguna',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $pengguna = Pengguna::create($data);

        return response()->json([
            'message' => 'Pengguna berhasil dibuat',
            'data' => $pengguna
        ], 201);
    }
            public function index(Request $request)
        {
            // cek role si user yang login
            if ($request->user()->role !== 'owner') {
                return response()->json([
                    'message' => 'Akses ditolak. Hanya owner yang boleh melihat data pengguna.'
                ], 403);
            }

            // ambil semua pengguna
            $pengguna = Pengguna::all();

            return response()->json([
                'message' => 'Daftar pengguna',
                'data' => $pengguna
            ]);
        }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $pengguna->update($request->all());

        return response()->json([
            'message' => 'Pengguna berhasil diperbarui',
            'data' => $pengguna
        ]);
    }

    public function destroy($id)
    {
        Pengguna::destroy($id);

        return response()->json(['message' => 'Pengguna dihapus']);
    }

}
