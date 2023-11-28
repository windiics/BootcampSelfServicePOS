<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "Mahasiswa";
    protected $fillable = ['nomor_induk', 'nama', 'alamat', 'foto'];
}
