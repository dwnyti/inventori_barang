<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function peminjaman_barang(){
        return $this->hasMany(PeminjamanBarang::class);
    }
}
