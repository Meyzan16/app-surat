<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_lampiran;
use App\Models\tb_perihal_surat;
use App\Models\tb_tujuan_surat;

class tb_loghistory_surat_umum extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'kode_prodi','id_lampiran', 'id_perihal','id_tujuan','isi_surat','tembusan'
    ];


    public function tb_lampiran()
    {
        return $this->belongsTo(tb_lampiran::class, 'id_lampiran');
    }

    public function tb_perihal_surat()
    {
        return $this->belongsTo(tb_perihal_surat::class, 'id_perihal');
    }

    public function tb_tujuan_surat()
    {
        return $this->belongsTo(tb_tujuan_surat::class, 'id_tujuan');
    }
}
