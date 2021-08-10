<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'Homem Aranha',
                'description' => 'Spider-Man é um jogo eletrônico de ação-aventura desenvolvido pela Insomniac Games e publicado pela
                Sony Interactive Entertainment.',
                'price' => 79.99,
                'image' => 'spider-man.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'FIFA 21',
                'description' => 'FIFA 21 é um videogame de simulação de esportes desenvolvido e publicado pela Electronic Arts, tendo
                como estrela da capa o jogador Kylian Mbappé.',
                'price' => 99.99,
                'image' => 'fifa.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'GTA V',
                'description' => 'Grand Theft Auto V é um jogo eletrônico de ação-aventura desenvolvido pela Rockstar North e
                publicado pela Rockstar Games.',
                'price' => 67.59,
                'image' => 'gta.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
