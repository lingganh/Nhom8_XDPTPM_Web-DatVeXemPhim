<?php

namespace Database\Seeders;

//use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        DB::table('admin')->insert([
            'name' => 'admin',
            'email' => 'admin01@gmail.com',
            'password' =>  bcrypt('admin123')


        ]);


    }
}
