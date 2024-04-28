<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Signalement;
use App\Models\User;
use Illuminate\Http\Request;

class SignalementController extends Controller
{
    public function index()
    {
        $signalements = Signalement::all();
        return response()->json($signalements);
    }

    public function store(Request $request)
    {
        $signalement = Signalement::create($request->all());

        // Get the count of reports for the product
        $produit_id = $request->input('produit_id');
        $reportsCount = Signalement::where('produit_id', $produit_id)->count();

        // If the product has 5 reports, delete it and block the user
        if ($reportsCount >= 5) {
            // Delete the product
            Produit::findOrFail($produit_id)->delete();

            // Block the user who reported the product
            $utilisateur_id = $request->input('user_id');
            User::findOrFail($utilisateur_id)->update(['bloque' => true]);

        }

        return response()->json($signalement, 201);
    }

    public function show(Signalement $signalement)
    {
        return response()->json($signalement);
    }

    public function update(Request $request, Signalement $signalement)
    {
        $signalement->update($request->all());
        return response()->json($signalement);
    }

    public function destroy(Signalement $signalement)
    {
        $signalement->delete();
        return response()->json(null, 204);
    }
}
