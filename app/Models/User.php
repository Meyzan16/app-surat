<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\tb_prodi;
use App\Models\tb_persetujuan;
use App\Models\tb_log_surat_mhs_umum;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $dates = ['deleted_at'];


    public function tb_prodi()
    {
        return $this->belongsTo(tb_prodi::class, 'kode_prodi', 'kode_prodi');
    }

    public function tb_log_srt_ket_msh_kuliah()
    {
        return $this->hasMany(tb_log_srt_ket_msh_kuliah::class);
    }

    public function tb_persetujuan()
    {
        return $this->hasOne(tb_persetujuan::class , 'users_id','id' );
    }

    public function tb_log_surat_mhs_umum()
    {
        return $this->hasMany(tb_log_surat_mhs_umum::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'password_noenkripsi',
        'kode_prodi',
        'roles',
        'status_aktif',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
