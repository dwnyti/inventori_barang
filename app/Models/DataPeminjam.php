<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPeminjam extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    public function peminjaman_barang(){
        return $this->hasMany(PeminjamanBarang::class);
    }

    public function kelas(){
        return $this->belongsTo(KelasData::class, 'kelas_id');
    }
}
