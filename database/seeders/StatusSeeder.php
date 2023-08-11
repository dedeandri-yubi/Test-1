<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            [
                'name' => 'Waiting',
                'description' => 'Waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Process',
                'description' => 'Process',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Finish',
                'description' => 'Finish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
