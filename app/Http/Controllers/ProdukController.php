<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
public function index()
{
    return response()->json([
        'message' => 'Daftar produk',
        'data' => Produk::all()
    ]);
}
public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required|integer',
        'kategori' => 'required',
        'status' => 'required',
    ]);

    $produk = Produk::create($request->all());

    return response()->json([
        'message' => 'Produk berhasil dibuat',
        'data' => $produk
    ], 201);
}
public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $produk->update($request->all());

    return response()->json([
        'message' => 'Produk berhasil diperbarui',
        'data' => $produk
    ]);
}
public function destroy($id)
{
    Produk::destroy($id);

    return response()->json(['message' => 'Produk dihapus']);
}
}
