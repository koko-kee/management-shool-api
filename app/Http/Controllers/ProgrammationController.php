<?php

namespace App\Http\Controllers;

use App\Models\Programmation;
use Illuminate\Http\Request;

class ProgrammationController extends Controller
{

    public function index()
    {
        return response()->json([
            'statut' => 200,
            'data' => Programmation::with(['professeur', 'matiere', 'classe'])->paginate(2)
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $save = Programmation::create([
            'matiere_id' => $data['matiere_id'],
            'classe_id' => $data['classe_id'],
            'professeur_id' => $data['professeur_id']
        ]);

        $datas = Programmation::find($save->id)->with(['professeur', 'matiere', 'classe'])->first();

        if ($save) {
            return response()->json([
                'statut' => 201,
                'data' => $datas
            ]);
        } else {
            return response()->json([
                'statut' => 500,
                'data' => null,
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $programmation = Programmation::find($id)->first();
        if ($programmation) {

            $programmation->matiere_id = $data['matiere_id'];
            $programmation->classe_id = $data['classe_id'];
            $programmation->professeur_id = $data['professeur_id'];
            $programmation->save();

            return response()->json([
                'statut' => 200,
                'data' => null
            ]);
        } else {
            return response()->json([
                'statut' => 404,
                'data' => null
            ]);
        }
    }


    public function destroy(string $id)
    {
        $programmation = Programmation::find($id)->first();
        if ($programmation) {
            $programmation->delete();
            return response()->json([
                "statut" => 204,
                "data" => null
            ]);
        } else {
            return response()->json([
                "statut" => 404,
                "data" => null,
            ]);
        }
    }
}
