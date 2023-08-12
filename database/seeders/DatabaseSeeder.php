<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Merchant;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB ::table('users')->insert([
            'full_name' =>'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 1',
            'remember_token' => Str ::random(10),
            'date_of_birth' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    $this->call([
        StatusSeeder::class,
    ]);
    City::factory(5) -> create();
    Merchant ::factory(5) -> create();
    Product ::factory(5) -> create();

    }
}
