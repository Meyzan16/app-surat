<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_data_mahasiswa;
use App\Models\tb_judul_surat;

class tb_log_srt_ket_msh_kuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_judul_surat', 'npm','angkatan', 'kode_prodi'
    ];

    public function tb_judul_surat()
    {
        return $this->belongsTo(tb_judul_surat::class, 'kode_judul_surat', 'kode_judul_surat');
    }

    public function tb_data_mahasiswa()
    {
        return $this->belongsTo(tb_data_mahasiswa::class, 'npm', 'npm');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'id_persetujuan', 'id');
    }



    

    
}
