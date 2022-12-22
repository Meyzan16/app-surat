<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_log_srt_ket_msh_kuliahs;
use App\Models\tb_log_surat_mhs_umum;

class tb_data_mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'npm', 'angkatan','nama' , 'email','jenkel', 'tanggal_lahir', 'kode_prodi',
    ];

    public function tb_log_srt_ket_msh_kuliah()
    {
        return $this->hasMany(tb_log_srt_ket_msh_kuliahs::class);
    }

    public function tb_log_surat_mhs_umum()
    {
        return $this->hasMany(tb_log_surat_mhs_umums::class);
    }

    public function tb_prodi()
    {
        return $this->belongsTo(tb_prodi::class, 'kode_prodi', 'kode_prodi');
    }

}
