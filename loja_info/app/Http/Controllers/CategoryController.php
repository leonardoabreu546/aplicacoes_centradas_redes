<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }

        $categorias = Category::all();
        return view('categories.index', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'O Nome da Categoria é obrigatório.',
        ]);

        Category::create([
            'Name' => $request->input('name'),
        ]);

        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $categoria = Category::find($id);
        return view('categories.edit', ['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $categoria = Category::find($id);
        $categoria->Name = $request->name;
        $categoria->save();

        return redirect(route('categories.index'));
    }

    public function destroy(int $id)
    {
        if (!Auth::user()->isAdmin) {
            return back();
        }

        $category = Category::find($id);
        $category->delete();

        return redirect(route('categories.index'));
    }
}