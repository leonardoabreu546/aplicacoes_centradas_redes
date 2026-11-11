<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function indexByCategory($id)
    {
        $categorias = Category::all();

        if ($id == 0) {
            $produtos = Product::all();
        } else {
            $categoria = Category::findOrFail($id);
            $produtos = $categoria->products;
        }

        return view('products.index', [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'idCategoriaAtiva' => $id
        ]);
    }

    public function index()
    {
        return $this->indexByCategory(0);
    }

    public function show($id)
    {
        $produto = Product::findOrFail($id);
        $categoria = $produto->category;

        return view('products.show', compact('produto', 'categoria'));
    }

    public function create()
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = new Product();
        $produto->Name = $request->input('Name');
        $produto->Description = $request->input('Description');
        $produto->Price = $request->input('Price');
        $produto->Stock = $request->input('Stock');
        $produto->category_id = $request->input('category_id');
        
        $produto->save();

        return redirect(route('products.show', $produto->id));
    }

    public function edit($id)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = Product::findOrFail($id);
        $categories = Category::all();
        
        return view('products.create', compact('produto', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = Product::findOrFail($id);
        
        $produto->Name = $request->input('Name');
        $produto->Description = $request->input('Description');
        $produto->Price = $request->input('Price');
        $produto->Stock = $request->input('Stock');
        $produto->category_id = $request->input('category_id');

        $produto->save();

        return redirect(route('products.show', $produto->id));
    }

    public function destroy($id)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = Product::findOrFail($id);
        $produto->delete();

        return redirect(route('products.index'));
    }
}