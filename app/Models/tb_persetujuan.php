<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class tb_persetujuan extends Model
{
    use HasFactory;

    protected $fillable = [
      'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
