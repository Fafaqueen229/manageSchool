@extends ('layout')
@section('content')
<h1 style="color:#050542" class="text-center mb-3">
    Ajouter un enseignant
</h1>
<div class="d-flex justify-content-center aligns-items-center border-primary" style="background-color:#42424d">
    <img src="{{asset('/images/img1 (3).JPG')}}" alt="img" style="margin-right:20px; height:450px; margin-top:30px" >
<form action="{{ route('store') }}" enctype="multipart/form-data" method="POST" class="me-2" >
@csrf
<div class="mt-5">
    <label for="lastname" class="form-label text-white fs-5">Nom de l'enseignant</label>
    <input type="text" name="lastname" class="form-control form-control-lg" id="lastname">
</div>

<div class="form-group">
    <label for="firstname" class="form-label text-white fs-5">Prénom de l'enseignant</label>
    <input type="text" name="firstname" class="form-control form-control-lg" id="firstname">
</div>

<div class="form-group">
    <label for="phonenumber" class="form-label text-white fs-5">Téléphone</label>
    <input type="number" name="phonenumber" class="form-control form-control-lg" id="phonenumber">
</div>

<div class="form-group">
    <label for="adress" class="form-label text-white fs-5">Adresse</label>
    <input type="text" name="adress" class="form-control form-control-lg" id="adress">
</div>

<button  class="btn btn-primary text-black mt-3 text-white fs-5 mx-2">Retour</button>
<button type="submit" class="btn btn-primary text-black mt-3 text-white fs-5">Ajouter</button>
</form>
</div>
@endsection