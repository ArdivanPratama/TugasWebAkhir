<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class adminaccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'adminnn', 'email' => 'adminnn@gmail.com', 'password' => bcrypt('admin1234')
        ]);
    }
}
