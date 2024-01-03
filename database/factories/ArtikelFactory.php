<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Topik;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id_user')->toArray();
        $topikIds = topik::pluck('id_topik')->toArray();

        return [
            'judul'=>$this->faker->sentence,
            'gambar'=>$this->faker->imageUrl,
            'konten'=>$this->faker->text($maxNbChars = 100),
            'tanggal'=>$this->faker->date($format = 'Y-m-d', $max= 'now'),
            'id_topik'=>$this->faker->randomElement($topikIds),
            'id_user'=>$this->faker->randomElement($userIds),

        ];
    }
}
