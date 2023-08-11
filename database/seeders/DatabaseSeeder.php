<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Car;
use App\Models\City;
use App\Models\Merchant;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB ::table('users')->insert([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'nomor_telepon' => '08123456789',
            'alamat' => 'Jl. Raya No. 1',
            'nomor_sim' => '123456789',
            'remember_token' => Str ::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    $this->call([
        StatusSeeder::class,
    ]);
    Car::factory(15) -> create();
    City::factory(5) -> create();
    Merchant ::factory(5) -> create();
    Product ::factory(5) -> create();

    }
}
