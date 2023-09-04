@extends ('layout')
@section('content')
<h1 style="color:#050542" class="text-center mb-3">
    Ajouter un cours
</h1>
<div class="d-flex justify-content-center aligns-items-center border-primary" style="background-color:#42424d">
    <img src="{{asset('/images/img1 (3).JPG')}}" alt="img" style="margin-right:20px; height:450px; margin-top:30px" >
<form action="" enctype="multipart/form-data" method="POST" class="me-2" >
@csrf
<div class="mt-5">
    <label for="namecourse" class="form-label text-white fs-5">Nom du cours</label>
    <input type="text" name="namecourse" class="form-control form-control-lg" id="namecourse" required>
</div>

<div class="form-group">
    <label for="coefficient" class="form-label text-white fs-5">Coefficient</label>
    <input type="number" name="coefficient" class="form-control form-control-lg" id="coefficient" required>
</div>

<div class="form-group">
    <label for="massehr" class="form-label text-white fs-5">Masse horaire</label>
    <input type="number" name="massehr" class="form-control form-control-lg" id="massehr" required>
</div>

<div class="form-group">
    <label for="id_categorie">Catégorie</label>
    <select class="form-control" id="category" name="category" required>
        @foreach ($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
        @endforeach
    </select>
</div>

<button  class="btn btn-primary text-black mt-3 text-white fs-5 mx-2">Retour</button>
<button type="submit" class="btn btn-primary text-black mt-3 text-white fs-5">Ajouter</button>
</form>
</div>
@endsection