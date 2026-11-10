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
}