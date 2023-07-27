<?php

namespace App\Models;

use App\Models\User;
use App\Models\DetailPesananan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detail(){
        return $this->hasMany(DetailPesananan::class, 'pesanan_id');
    }

}
