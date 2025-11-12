<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    public function run(): void
    {
        $halls = [
            [
                'name' => 'Dewan Utama MDKK',
                'location' => 'Majlis Daerah Kuala Krai',
                'capacity' => 300,
                'description' => 'Dewan utama untuk majlis rasmi dan program komuniti.',
            ],
            [
                'name' => 'Dewan Mini Kampung Sungai Durian',
                'location' => 'Kampung Sungai Durian',
                'capacity' => 150,
                'description' => 'Sesuai untuk program komuniti kecil dan aktiviti setempat.',
            ],
            [
                'name' => 'Dewan Komuniti Manek Urai',
                'location' => 'Manek Urai',
                'capacity' => 200,
                'description' => 'Dewan komuniti bagi kegunaan orang awam.',
            ],
        ];

        foreach ($halls as $hall) {
            Hall::create($hall);
        }
    }
}
