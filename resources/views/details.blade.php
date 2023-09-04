@extends ('layout')
@section ('content')

<div class="container mt-5">
    <div class="card d-flex align-items-center justify-content-center mx-auto  div_details">
        @if (isset ($id))
        @foreach ($students as $etudiant)
        @if($id == $etudiant['id'])
        <div>
            <img src="{{asset($etudiant['picture'])}}" alt="" class="card-img-top ">
            <div class="card-body">
                <h4 class="card-text">Nom: {{$etudiant['lastname']}}</h4>
                <h4 class="card-text" >Prénom: {{$etudiant['firstname']}}</h4>
                <p class="card-text "> <strong style="font-size: 20px">Date de naissance:{{$etudiant['dateofbirth']}}</strong></p>
                <p class="card-text"> <strong style="font-size: 20px"> Hobbies: {{$etudiant['hobbies']}}</strong></p>
                <p class="card-text"> <strong style="font-size: 20px"> Spécialité: {{$etudiant['speciality']}}</strong></p>
                <p class="card-text"> <strong style="font-size: 20px">Biographie: {{$etudiant['bio']}}</strong></p>

                <a 
                @if ($id>1) 
                href="{{route('details',['id'=>$etudiant['id']+ 1])}}"
                 @else 
                 href="{{route('index',['id'=>$etudiant['id']])}}" 
                 @endif class="btn btn-primary">
                  Retour
                </a>
 
                <a
                 @if ($id < sizeof($students)) 
                 href="{{route('details',['id'=>$etudiant['id']- 1])}}"
                   
                 @else href="{{route('index',['id'=>$etudiant['id']])}}" 
                 @endif class="btn btn-primary"> 
                 Suivant
                </a>
             </div>
                 @endif
                 @endforeach
                 @endif
            </div>
        </div>
</div>
@endsection