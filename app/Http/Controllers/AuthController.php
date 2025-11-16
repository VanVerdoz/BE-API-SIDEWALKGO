<?php
namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // 🧾 Register pengguna baru
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:pengguna',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $pengguna = Pengguna::create($validated);

        return response()->json([
            'message' => 'Registrasi berhasil',
            'data' => $pengguna
        ], 201);
    }

    // 🔐 Login pengguna
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pengguna = Pengguna::where('username', $request->username)->first();

        if (!$pengguna || !Hash::check($request->password, $pengguna->password)) {
            throw ValidationException::withMessages([
                'username' => ['Username atau password salah.'],
            ]);
        }

        // buat token sanctum
        $token = $pengguna->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'data' => [
                'id' => $pengguna->id,
                'nama_lengkap' => $pengguna->nama_lengkap,
                'role' => $pengguna->role,
                'status' => $pengguna->status,
            ]
        ]);
    }

    // 🚪 Logout pengguna
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout berhasil']);
    }

    // 👤 Profil pengguna login
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }
}
