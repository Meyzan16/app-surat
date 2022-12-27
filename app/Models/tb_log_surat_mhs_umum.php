<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_judul_surat;
use App\Models\tb_data_mahasiswa;
use App\Models\user;

class tb_log_surat_mhs_umum extends Model
{
    use HasFactory;
    protected $fillable = [
       'npm', 'kode_prodi' ,   'id_judul_surat',
    ];

    public function tb_judul_surat()
    {
        return $this->belongsTo(tb_judul_surat::class, 'id_judul_surat', 'id');
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
