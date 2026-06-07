<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            "name"=> "rama",
            "email"=> "rama3@gmail.com",
            "password"=> Hash::make("1234567890"),
        ]);
        DB::table("users")->insert([
            "name"=> "ahmad",
            "email"=> "ahmad@gmail.com",
            "password"=> Hash::make("123456789"),
            ]);
    }
}
