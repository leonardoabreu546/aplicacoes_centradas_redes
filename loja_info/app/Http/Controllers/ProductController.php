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

        $categorias = Category::all();
        return view('products.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = new Product();
        $produto->Name = $request->input('name');
        $produto->Description = $request->input('desc');
        $produto->Cost = $request->input('cost');
        $produto->category_id = $request->input('cat');
        $produto->owner_id = Auth::user()->id;
        
        // Se estiveres a usar Cloudinary ou upload normal:
        $produto->img = $request->input('img') ?? '/img/default.jpg';
        
        $produto->save();

        return redirect(route('products.show', $produto->id));
    }

    public function edit($id)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = Product::findOrFail($id);
        $categorias = Category::all();
        
        return view('products.create', compact('produto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user() || !Auth::user()->isAdmin) {
            return back();
        }

        $produto = Product::findOrFail($id);
        
        $produto->Name = $request->input('name');
        $produto->Description = $request->input('desc');
        $produto->Cost = $request->input('cost');
        $produto->category_id = $request->input('cat');
        
        if ($request->filled('img')) {
            $produto->img = $request->input('img');
        }

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