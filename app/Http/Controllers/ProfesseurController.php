<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([

            'statut' => 200,
            'data' => Professeur::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $save = Professeur::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'specialite' => $data['specialite']
        ]);

        if ($save) {
            return response()->json([
                'statut' => 201,
                'data' => $save
            ]);
        } else {
            return response()->json([
                'statut' => 500,
                'data' => null,
                'message' => "Insertion echouer"
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
