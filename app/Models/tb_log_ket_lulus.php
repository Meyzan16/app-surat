<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_log_ket_lulus extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_judul_surat', 'npm' ,'angkatan', 'kode_prodi'
    ];
}
