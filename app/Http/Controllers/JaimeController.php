<?php

namespace App\Http\Controllers;

use App\Models\Jaime;
use Illuminate\Http\Request;

class JaimeController extends Controller
{

    public function store(Request $request)
    {
        $jaime = Jaime::create($request->all());
        return response()->json($jaime, 201);
    }
}
