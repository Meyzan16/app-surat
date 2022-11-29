<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\tb_judul_surat;

class tb_jenis_surat extends Model
{
    use HasFactory;

    public function tb_judul_surat()
    {
        return $this->hasMany(tb_judul_surat::class);
    }

}
