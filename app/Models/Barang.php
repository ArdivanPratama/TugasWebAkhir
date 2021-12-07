<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'ukuran_barang',
        'kategory_id',
        'deskripsi_barang',
    ];
    public function kategory()
    {
        return $this->belongsTo(Kategory::class, 'kategory_id', 'id');
    }
}
