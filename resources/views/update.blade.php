@extends ('layout')
@section ('content')

<h1 style="color:#050542" class="text-center mb-3">
   Modifier un étudiant
</h1>
<div class="d-flex justify-content-center aligns-items-center border-primary" style="background-color:#42424d">
    <img src="{{asset('/images/img1 (1).JPG')}}" alt="img" style="margin-right:20px; height:550px; margin-top:30px" >
<form action="{{route('update',['id'])}}" enctype="multipart/form-data" method="POST" class="me-2" >
    @method('PUT')
@csrf
<div class="mt-4">
    <label for="lastname" class="form-label text-white fs-5">Nom de l'étudiant</label>
    <input type="text" name="lastname" class="form-control form-control-sm" value="{{$students->lastname}}" id="lastname">
</div>

<div class="form-group">
    <label for="firstname" class="form-label text-white fs-5">Prénom de l'étudiant</label>
    <input type="text" name="firstname" class="form-control form-control-sm" value="{{$students->firstname}}" id="firstname">
</div>

<div class="form-group">
    <label for="dateofbirth" class="form-label text-white fs-5">Date de naissance</label>
    <input type="date" name="dateofbirth" class="form-control form-control-sm" value="{{$students->dateofbirth}}" id="dateofbirth">
</div>

<div class="form-group">
    <label for="hobbies" class="form-label text-white fs-5">Hobbies</label>
    <input type="text" name="hobbies" class="form-control form-control-sm" value="{{$students->hobbies}}" id="hobbies">
</div>

<div class="form-group">
    <label for="speciality" class="form-label text-white fs-5">Spécialité</label>
    <select name="speciality" class="form-control form-control-sm" value="{{$students->speciality}}" id="speciality">
        <option value=" Compétences Numériques Fondamentales ">CNF</option>
        <option value="Développement Web et Mobile">DWM</option>
    </select>
</div>

<div class="form-group">
    <label for="bio" class="form-label text-white fs-5">Bio</label>
    <input class="form-control form-control-sm" name="bio" value="{{$students->bio}}" id="bio">
</div>

<div class="form-group">
    <label for="picture" class="form-label text-white fs-5">Ajouter une photo</label>
    <input type="file" name="picture" class="form-control form-control-sm" value="{{$students->picture}}" id="picture">
</div>
<br>
<button type="submit" class="btn btn-primary text-black mb-3 text-white fs-5">Modifier</button>
</form>
</div>
@endsection