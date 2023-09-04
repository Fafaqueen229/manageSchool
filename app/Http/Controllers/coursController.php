<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class coursController extends Controller
{        public function gestionCours(){
            $tableaux = Cours::all();
            return view("cours.gestionCours", compact("tableaux"));
        }
    
        public function create()
        {
            $category = Category::all();
            return view('cours.create', compact('category'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'nom_cours' => 'required',
                'masse_horaire' => 'required|integer',
                'coef' => 'required|numeric',
                'category_id' => 'required|exists:categoryCours,id',
            ]);
    
            Cours::create([
                'nom_cours' => $request->input('nom_cours'),
                'max_horaire' => $request->input('masse_horaire'),
                'coef' => $request->input('coef'),
                'category_id' => $request->input('category_id'),
            ]);
    
            return redirect()->route('gestionCours')
                ->with('success', 'Cours ajouté avec succès.');
        }
    
        public function delete($id){
            $etudiant = Cours::find($id);
            if($etudiant) {
                $etudiant->delete();
                return redirect()->route('gestionCours')->with("message", "Le cours a été supprimé avec sucèss !");
            } else {
                return redirect()->route('gestionCours')->with("error", "Oups le cours n'a pas été trouvé !");
            }
        }
    
        public function update($id){
            $students = Cours::find($id);
            if($students) {
                $category = Category::all();
                return view("cours.update", compact('etudiant','categories'));
            } else {
                return redirect()->route('gestionsCours')->with("error", "Oups le cours n'a pas été trouvé !");
            }
        }
    
        //updateStoreEnseignant
        public function updateStore(Request $request){
            $data = $request->all();
            $enseignant = Cours::find($data['id']);
            if($enseignant) {
                $validation =$request->validate([
                    'nom_cours' => 'required',
                    'max_horaire' => 'required|integer',
                    'coef' => 'required|numeric',
                    'id_categorie' => 'required|exists:categories_de_cours,id',
                ]);
                
                $enseignant->nom_cours = $data['nom_cours'];
                $enseignant->masse_horaire = $data['masse_horaire'];
                $enseignant->coef = $data['coef'];
                $enseignant->id_categorie = $data['category_id'];
                $enseignant->save();
    
                return redirect()->route('gestionCours')->with("message"," Cours modifié avec sucèss !");
            } else {
                return redirect()->route('gestionCours')->with("error", "Oups le cours n'a pas été trouvé !");
            }        
        }
    }
    
