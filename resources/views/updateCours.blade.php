@extends('layout')

@section('content')
    <br>
    <h1 class="text-center">Modifier un cours</h1>
    <br>
    <form action="{{ route('update_cours') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input value="{{$etudiant->id}}" type="hidden" name="id" id="id">

        <div class="row">
            <div class="col-md-6">
                <label for="nom">Nom cours : </label>
                <input required class="form-control" value="{{$etudiant->nom_cours}}" type="text" name="nom_cours" id="nom_cours">
            </div> 
            <div class="col-md-6">
                <label for="prenom">Max horaire : </label>
                <input required class="form-control" value="{{$etudiant->max_horaire}}" type="text" name="max_horaire" id="max_horaire">
            </div>    
        </div>  
        <br>
        <div class="row">
            <div class="col-md-6">
                <label for="hobbies">Coefficient : </label>
                <input required class="form-control" value="{{$etudiant->coef}}" type="text" name="coef" id="coef">
            </div> 
            <div class="col-md-6">
                <label for="specialite">Catégorie : </label>
                <select class="form-control" id="id_categorie" name="id_categorie" required>
                    @foreach ($categories as $categorie)
                        @if ($etudiant->id_categorie == $categorie->id)
                            <option selected value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @else
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>    
        </div> 
        <br>
        <input class="pt-2 btn btn-primary" type="submit" value="Modifier un cours"> 
    </form>   
@endsection