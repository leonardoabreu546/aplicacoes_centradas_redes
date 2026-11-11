<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function indexByCategory($id)
    {
        $categories = Category::all();

        if ($id == 0) {
            $products = Product::with('category')->get();
        } else {
            $category = Category::findOrFail($id);
            $products = $category->products; // Usa a relação hasMany definida no Model Category
        }

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'idCategoriaAtiva' => $id
        ]);
    }

    public function index()
    {
        return $this->indexByCategory(0);
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
        $categories = Category::all(); // Para permitir escolher a categoria se necessário
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
        $categories = Category::all(); // Para preencher o select de categorias
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