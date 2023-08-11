<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'merek' => $this->faker->randomElement(["Toyota","Honda","Suzuki","Mitsubishi","Daihatsu","Nissan"]),
            'model' => $this->faker->randomElement(["Avanza","Xenia","Agya","Brio","Jazz","Ertiga"]),
            'tahun' => $this->faker->randomElement(["2010","2011","2012","2013","2014","2015"]),
            'warna' => $this->faker->randomElement(["merah","biru","kuning","hijau","hitam","putih"]),
            'plat_nomor' => 'B '.random_int(1000,9999).' '.random_int(100,999).' '.random_int(10,99). ' ' . $this->faker->randomElement(["ABC","ABD","ABE","ABF","ABG","ABH"]),
            'harga_sewa' => $this->faker->randomElement(["100000","200000","300000","400000","500000","600000"]),
            'status' => 'Tersedia'
        ];
    }
}
