<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category_cours,name',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('gestionCours')
            ->with('success', 'Catégorie ajoutée avec succès.');
    }

}


