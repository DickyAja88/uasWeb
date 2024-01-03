<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topik;

class TopikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topik::create(['topik'=> 'Alam']);
        Topik::create(['topik'=>'Lingkungan']);
        Topik::create(['topik'=>'Iklim']);
        Topik::create(['topik'=>'Flora']);
        Topik::create(['topik'=>'Fauna']);
    }
}
