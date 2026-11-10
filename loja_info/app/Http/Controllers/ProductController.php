<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Ir buscar todos os produtos com a respetiva categoria
        $products = Product::with('category')->get();

        // Retornar uma vista com os produtos
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        // Encontrar o produto pelo ID ou dar erro 404 se não existir
        $product = Product::with('category')->findOrFail($id);

        // Retornar a vista de detalhes
        return view('products.show', compact('product'));
    }
}