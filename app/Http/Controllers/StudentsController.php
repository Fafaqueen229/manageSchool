<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Student;
use Illuminate\Http\Request;
use illuminateSupportFacadesStorage;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $ids=idsDB();
        return $ids; */
        $students = Student::all();
        $students= Student::paginate(2);

        return view('index', compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created()
    {
        return view ('created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data= $request->all();
        $validatedData= $request->validate([
            'lastname' =>'required|max:255',
            'firstname' =>'required|max:255',
            'dateofbirth' =>'required',
            'hobbies' =>'required|max:255',
            'picture' =>'required|mimes:jpeg,png,jpg,PNG,JPG',
            'speciality' =>'required|max:255',
            'bio' =>'required|max:255',
        ]);
     if($request ->hasFile("picture")){
            $path = $request->file('picture')->store('avatar');

           
        }
       
      /* if($data['picture']){
        $picture=$data['picture'];
        $path=$picture->store('avatar');
       }
       */
       $save= Student::create($validatedData);

       return redirect()-> route('index')->with("success" , "Etudiant ajouté avec succès");
   }

     /*  if ($picture = $request->file('image')){
            $destinationPath= 'picture/ ';
            $profileImage = date('YmdHis') .".". $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $profileImage) ;

        } */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

/*
     public function update( Request $request ,$id)
     {
         $students= Student::find($id);
        if(!$students) {
        
         return redirect()->route('index')->with('error',"Etudiant introuvable");
 
     }
 
     $students->lastname = $request->input('lastname');
     $students->firstname = $request->input('firstname');
     $students->speciality = $request->input('speciality');
     $students->hobbies = $request->input('hobbies');
     $students->bio = $request->input('bio');
     $students->picture = $request->input('picture');
     $students->dateofbirth = $request->input('dateofbirth');
   
     $students->save();
     return redirect()->route('index')->with('success',"Etudiant mis à jour avec succès");
 }
*/
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update( Request $request ,$id)
    {
       $students= Student::find($id);
    //$students->update($request->all());
     
        return view('update', compact('id','students'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $students = Student::find($id);
       
            $students->delete();
            return redirect()->route('index')->with('success', 'étudiant supprimé avec succès');
        }
      
      public function details ($id=null){
        $students =Student::all ();
        return view('details',compact('id','students'));
      }
        
      
    public function activate($id){
        $students = Student::find($id);
        if(!$students){
            return redirect()->back()->with('error', 'Etudiant introuvable');
        }
        $students->statut = $students->statut == 0 ? 1 : 0;
        $students->save();
        return redirect()->back()->with('success', 'Statut mis à jour avec succès');
    }
}

           
    
