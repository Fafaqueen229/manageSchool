@extends ('master')
@section('content')

<div style="width: 600px" class="container position-absolute top-50 start-50 translate-middle">

    <div class="card border-primary">
        <div class="card-header bg-primary text-white">
            <h2>Authentification</h2>
        </div>
        <section >
            @if(session("error"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Message d'erreur</strong> <br> {{session("error")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
                </button>
            </div>
        @endif
            @if(session("success"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Message de succès</strong> <br> {{session("success")}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
                    </button>
                </div>
            @endif
            </section>
        <div class="card-body">
            <form action="{{route('authentification')}}" method="POST"  autocomplete="off">
                @csrf
                <div class="form-group mb-3">
               <label for="" class="form-label">Email</label>
               <input required type="email" class="form-control" name="email" placeholder="saisir votre email">
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label">  Mot de passe </label>
                    <input required type="password" class="form-control" name="password" placeholder="saisir votre mot de passe">
                    <a  href="{{route('forgotPassword')}}">Mot de passe oublié ?</a>
                     </div>
                     <button class="btn-primary btn float-end" type="submit">Connexion</button>
            </form>
            <p>Vous n'avez pas un compte ? <a href="{{route('register')}}"Cliquez ici>S'inscrire</a></p>
        </div>
    </div>
</div>

@endsection