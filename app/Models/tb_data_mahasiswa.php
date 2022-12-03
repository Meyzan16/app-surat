<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_data_mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'npm', 'nama' , 'jenkel', 'tanggal_lahir', 'kode_prodi',
    ];

}
