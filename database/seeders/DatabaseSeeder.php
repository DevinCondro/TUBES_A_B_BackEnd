<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'nama' => 'Wahyu',
            'email' => 'yohanesrestuwahyu@gmail.com',
            'tanggal_lahir' => '11 Juli 2002',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
    }
}
