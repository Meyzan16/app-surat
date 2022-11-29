<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_jenis_surat;

class tb_judul_surat extends Model
{
    use HasFactory;

    public function tb_jenis_surat()
    {
        return $this->belongsTo(tb_jenis_surat::class, 'kode_jenis_surat', 'kode_surat');
    }
}
