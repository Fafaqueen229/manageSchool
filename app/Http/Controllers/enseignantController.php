<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Models\AffectationProf;

class enseignantController extends Controller
{
    public function index(){
        $tableaux = Enseignant::all();
        return view("index", compact("tableaux"));
    }

    public function create()
    {
        return view('addProf');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'adresse' => 'required',
        ]);

        Enseignant::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'tel' => $request->input('tel'),
            'adresse' => $request->input('adresse'),
        ]);

        return redirect()->route('enseignants_index')
            ->with('success', 'Enseignant ajouté avec succès.');
    }

    public function delete($id){
        $etudiant = Enseignant::find($id);
        if($etudiant) {
            $etudiant->delete();
            return redirect()->route('enseignants_index')->with("message", "L'enseignant " . $etudiant->nom . " " . $etudiant->prenom . " a été supprimé avec sucèss !");
        } else {
            return redirect()->route('enseignants_index')->with("error", "Oups l'enseignant n'a pas été trouvé !");
        }
    }

    public function update($id){
        $etudiant = Enseignant::find($id);
        if($etudiant) {
            return view("enseignants.update", compact('etudiant'));
        } else {
            return redirect()->route('enseignants_index')->with("error", "Oups l'étudiant n'a pas été trouvé !");
        }
    }

    //updateStoreEnseignant
    public function updateStoreEnseignant(Request $request){
        $data = $request->all();
        $enseignant = Enseignant::find($data['id']);
        if($enseignant) {
            $validation =$request->validate([
                "nom" => "required",
                "prenom" =>"required",
                "tel"=>"required",
                "adresse" => "required"
            ]);
            
            $enseignant->nom = $data['nom'];
            $enseignant->prenom = $data['prenom'];
            $enseignant->tel = $data['tel'];
            $enseignant->adresse = $data['adresse'];
            $enseignant->save();

            return redirect()->route('enseignants_index')->with("message"," Enseignant modifié avec sucèss !");
        } else {
            return redirect()->route('enseignants_index')->with("error", "Oups l'enseignant n'a pas été trouvé !");
        }        
    }


    public function affectCours($id)
    {
        // Récupérez la liste des attributions avec les étudiants et les cours associés
        // Récupérez les attributions groupées par étudiant avec les cours associés
        $attributions = AffectationProf::with(['enseignant', 'cours'])
                        ->get()
                        ->groupBy('enseignant_id');

        // Récupérez la liste des étudiants et des cours
        $enseignant = Enseignant::find($id);
        $enseignants = Enseignant::all();
        $courses = Cours::all();
        // dd($attributions);
        // Affichez la vue avec les données
        return view('enseignants.attributions', compact('attributions','enseignant','enseignants', 'courses'));
    }

    public function storeAffectCours(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'enseignant_id' => 'required|exists:enseignants,id',
            'cours_id' => 'required|array',
            'cours_id.*' => 'exists:cours,id',
        ]);

        // Récupérez l'ID de l'enseignant
        $enseignantId = $request->input('enseignant_id');

        // Bouclez sur les cours sélectionnés
        foreach ($request->input('cours_id') as $coursId) {
            // Vérifiez si le couple (enseignant_id, cours_id) existe déjà
            $existingAttribution = AffectationProf::where('enseignant_id', $enseignantId)
                ->where('cours_id', $coursId)
                ->first();

            // Si le couple n'existe pas, créez une nouvelle attribution
            if (!$existingAttribution) {
                AffectationProf::create([
                    'enseignant_id' => $enseignantId,
                    'cours_id' => $coursId,
                ]);
            }
        }

        // Redirigez l'utilisateur vers la route "assigne_enseignant" avec le paramètre d'ID
        return redirect()->route('assigne_enseignant', ['id' => $request->input('enseignant_id')])
            ->with('success', 'Attributions de cours ajoutées avec succès.');
    }



}
