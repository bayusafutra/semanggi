<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Cart;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];

    public function kategori(){
        return $this->hasMany(Kategori::class, 'user_id');
    }

    public function barang(){
        return $this->hasMany(Barang::class, 'user_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'user_id');
    }
}
