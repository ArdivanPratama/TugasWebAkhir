<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class JenisBarang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama_jenis_barang' => 'Celana Panjang'
        ]);
        Barang::create([
            'nama_jenis_barang' => 'Kemeja'
        ]);
        Barang::create([
            'nama_jenis_barang' => 'Tuxedo'
        ]);
    }
}
