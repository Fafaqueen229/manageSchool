<?php

namespace App\Http\Controllers;
use App\Models\AttributionEtudiant;
use App\Models\Student;
use App\Models\Cours;
use Illuminate\Http\Request;

class attributionEtudiantController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Récupérez la liste des attributions avec les étudiants et les cours associés
        // Récupérez les attributions groupées par étudiant avec les cours associés
        $attributions = AttributionEtudiant::with(['students', 'cours'])
                        ->get()
                        ->groupBy('students_id');

        // Récupérez la liste des étudiants et des cours
        $tudents = Student::all();
        $course = Cours::all();
        // Affichez la vue avec les données
        return view('cours.attributions', compact('attributions','students', 'cours'));
    }


    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'students_id' => 'required|exists:students,id',
            'cours_id' => 'required|array',
            'cours_id.*' => 'exists:cours,id',
        ]);

    }


      // Récupérez l'ID de l'étudiant
      $students = $request->input('students_id');

      // Bouclez sur les cours sélectionnés
      foreach ($request->input('cours_id') as $coursId) {
          // Vérifiez si le couple (etudiant_id, cours_id) existe déjà
          $existingAttribution = Attribution::where('students_id', $studentsId)
              ->where('cours_id', $coursId)
              ->first();

          // Si le couple n'existe pas, créez une nouvelle attribution
          if (!$existingAttribution) {
              AttributionEtudiant::create([
                  'students_id' => $studentsId,
                  'cours_id' => $coursId,
              ]);
          }
     

      return redirect()->route('attributions.index')
          ->with('success', 'Attributions de cours ajoutées avec succès.');
  
        }
   

