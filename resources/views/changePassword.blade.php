@extends ('layout')
@section('content')


<div style="width: 600px" class="container position-absolute top-50 start-50 translate-middle">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white">
            <h2>Changer le mot de passe</h2>
        </div>
        <section>
            @if(session("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Message success</strong> <br> {{session("success")}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
                    </button>
                </div>
            @endif
            </section>
        <div class="card-body">
            <form action="{{route('updatePwd', ['email'=>$email])}}" method="POST"  autocomplete="off">
                @csrf
                
                <div class="form-group mb-3">
                    <label for="" class="form-label">  Mot de passe </label>
                    <input required type="password" class="form-control" name="password" placeholder="Saisir votre mot de passe">
                     </div>

                     <div class="form-group mb-3">
                    <label for="" class="form-label">  Confirmation de mot de passe </label>
                    <input required type="password" class="form-control" name="password_confirmation" placeholder="Confirmer votre motde passe">
                     </div>

                     <button class="btn-primary btn float-end" type="submit">Confirmer</button>
                    </div>
                </div>   
            </div>
                