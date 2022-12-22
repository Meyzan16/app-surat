<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_jenis_surat;
use App\Models\tb_log_srt_ket_msh_kuliah;
use App\Models\tb_loghistory_surat_umum;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_judul_surat extends Model
{
    use HasFactory;
    
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'kode_jenis_surat', 'judul_surat' , 'masa_aktif'
    ];

    public function tb_jenis_surat()
    {
        return $this->belongsTo(tb_jenis_surat::class, 'kode_jenis_surat', 'kode_surat');
    }

    public function tb_log_srt_ket_msh_kuliah()
    {
        return $this->hasMany(tb_log_srt_ket_msh_kuliah::class);
    }

    public function tb_loghistory_surat_umum()
    {
        return $this->hasMany(tb_loghistory_surat_umum::class);
    }
}
