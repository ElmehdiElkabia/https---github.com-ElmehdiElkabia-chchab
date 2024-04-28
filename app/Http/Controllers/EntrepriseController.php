<?php
namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::all();
        return response()->json($entreprises);
    }

    public function store(Request $request)
    {
        $entreprise = Entreprise::create($request->all());
        return response()->json($entreprise, 201);
    }

    public function show(Entreprise $entreprise)
    {
        return response()->json($entreprise);
    }

    public function update(Request $request, Entreprise $entreprise)
    {
        $entreprise->update($request->all());
        return response()->json($entreprise);
    }

    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return response()->json(null, 204);
    }
    public function search(Request $request)
    {
        $query = $request->input('q');

        $entreprises = Entreprise::where('name', 'like', "%$query%")->get();

        return response()->json($entreprises);
    }
}
