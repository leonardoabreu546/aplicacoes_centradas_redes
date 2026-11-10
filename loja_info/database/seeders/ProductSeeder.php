<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Encontrar categorias para associar aos produtos
        $componente = Category::where('Name', 'Componentes')->first();
        $periferico = Category::where('Name', 'Periféricos')->first();

        Product::create([
            'Name' => 'Placa Gráfica RTX 4060',
            'Price' => 329.99,
            'Stock' => 15,
            'Description' => 'Placa gráfica de alta performance para jogos.',
            'category_id' => $componente ? $componente->id : 1, 
        ]);

        Product::create([
            'Name' => 'Teclado Mecânico RGB',
            'Price' => 79.99,
            'Stock' => 30,
            'Description' => 'Teclado mecânico com switches mecânicos e iluminação RGB.',
            'category_id' => $periferico ? $periferico->id : 1,
        ]);
    }
}
