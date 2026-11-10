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

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = \App\Models\Category::all(); // Para permitir escolher a categoria se necessário
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Atualizar os campos (com foco especial no stock)
        $product->update([
            'Name' => $request->input('Name'),
            'Price' => $request->input('Price'),
            'Stock' => $request->input('Stock'),
            'Description' => $request->input('Description'),
        ]);

        return redirect('/products/' . $product->id)->with('success', 'Produto atualizado com sucesso!');
    }

    public function create()
    {
        $categories = \App\Models\Category::all(); // Para preencher o select de categorias
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validar e criar o novo produto
        Product::create([
            'Name' => $request->input('Name'),
            'category_id' => $request->input('category_id'),
            'Price' => $request->input('Price'),
            'Stock' => $request->input('Stock'),
            'Description' => $request->input('Description'),
        ]);

        return redirect('/products')->with('success', 'Produto criado com sucesso!');
    }
}