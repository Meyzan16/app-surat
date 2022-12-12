<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_jenis_surat;
use App\Models\tb_log_srt_ket_msh_kuliah;

class tb_judul_surat extends Model
{
    use HasFactory;
    

    public function tb_jenis_surat()
    {
        return $this->belongsTo(tb_jenis_surat::class, 'kode_jenis_surat', 'kode_surat');
    }

    public function tb_log_srt_ket_msh_kuliah()
    {
        return $this->hasMany(tb_log_srt_ket_msh_kuliah::class);
    }
}
