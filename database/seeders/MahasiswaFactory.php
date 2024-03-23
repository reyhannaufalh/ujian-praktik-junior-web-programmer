<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaFactory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return [
            'nim' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'tanggal_lahir' => fake()->date(),
            'gender' => fake()->randomElement(['L', 'P']),
            'usia' => fake()->numberBetween(17, 25),
        ];
    }
}