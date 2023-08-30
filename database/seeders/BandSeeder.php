<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Band;

class BandSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {


          Band::factory(10)->create();

         $Bands = [
            [
                'name' => 'Estillore, John Lorrence',
                'description' => 'I am the owner',
                'address' => 'Cogon, Inabanga, Bohol',
                'date' => '2001-04-13',
                'email' => 'estillorelawrence7@gmail.com',

            ],
            [
                'name' => 'Estillore, John Lorrence',
                'description' => 'I am the owner',
                'address' => 'Cogon, Inabanga, Bohol',
                'date' => '2001-04-13',
                'email' => 'estillorelawrence7@yahoo.com',

            ],
            [
                'name' => 'Estillore, John Lorrence',
                'description' => 'Mao ni',
                'address' => 'Cogon, Inabanga, Bohol',
                'date' => '2001-04-13',
                'email' => 'estillorejohnlorrence@gmail.com',

            ],

        ];

        foreach($Bands as $b) {
            Band::create($b);
        }
    }
}
