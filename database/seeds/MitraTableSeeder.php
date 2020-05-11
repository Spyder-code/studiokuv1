<?php

use Illuminate\Database\Seeder;
use App\Mitra;
use Illuminate\Support\Facades\Hash;

class MitraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mitra::create([
            'nama' => 'Almi',
            'email' => 'luaysyauqillah@gmail.com',
            'password' => Hash::make('admin123'),
            'alamat' => 'mojokerto',
            'nomor' => '083857317946',
            'image' => "default.jpg",
        ]);
    }
}
