<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\tb_data_mahasiswa;

class tb_prodi extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function tb_data_mahasiswa()
    {
        return $this->hasMany(tb_data_mahasiswa::class);
    }
}
