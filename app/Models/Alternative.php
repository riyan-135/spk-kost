<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'kost_id');
    }

    public function harga()
    {
        return $this->belongsTo(Jarak::class, 'harga_id');
    }

    public function jarak()
    {
        return $this->belongsTo(Jarak::class, 'jarak_id');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }

    public function luas()
    {
        return $this->belongsTo(LuasKamar::class, 'luas_kamar_id');
    }

    // public function kost()
    // {
    //     return $this->belongsTo(Kost::class, 'kost_id');
    // }
}
