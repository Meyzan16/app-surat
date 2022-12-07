<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_log_srt_ket_msh_kuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_judul_surat', 'npm'
    ];

    public function tb_judul_surat()
    {
        return $this->belongsTo(tb_judul_surat::class, 'kode_judul_surat', 'kode_judul_surat');
    }
}
