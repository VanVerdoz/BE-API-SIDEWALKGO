<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // penting untuk auth
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory;
    public $timestamps = false;

    protected $table = 'pengguna';

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
