<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_log_surat_mhs_umum extends Model
{
    use HasFactory;
    protected $fillable = [
       'npm', 'kode_prodi' ,   'id_judul_surat',
    ];
}
