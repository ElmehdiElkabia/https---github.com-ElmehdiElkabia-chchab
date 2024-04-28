<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return response()->json($produits);
    }
    public function topLiked()
    {
        // Retrieve the top liked products
        $topLikedProduits = Produit::withCount('jaimes')->orderByDesc('jaimes_count')->take(5)->get();

        return response()->json($topLikedProduits);
    }
    public function store(Request $request)
    {
        $produit = Produit::create($request->all());
        return response()->json($produit, 201);
    }

    public function show(Produit $produit)
    {
        return response()->json($produit);
    }

    public function update(Request $request, Produit $produit)
    {
        $produit->update($request->all());
        return response()->json($produit);
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return response()->json(null, 204);
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $produits = Produit::where('name', 'like', "%$query%")->get();

        return response()->json($produits);
    }

}
