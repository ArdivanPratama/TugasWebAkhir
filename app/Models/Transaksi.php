<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'id_barang',
        'id_user',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
