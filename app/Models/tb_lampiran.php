<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\tb_loghistory_surat_umum;

class tb_lampiran extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'judul_lampiran'
    ];

    public function tb_loghistory_surat_umum()
    {
        return $this->hasMany(tb_loghistory_surat_umum::class);
    }
}
