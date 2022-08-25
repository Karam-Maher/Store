<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Karam Maher',
        //     'email' => 'Karam@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone_number' => '0599019826',
        // ]);
    }
}
