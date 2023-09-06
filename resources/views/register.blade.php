
@extends ('master')
@section('content')


<div style="width: 500px; height:500px;" class="container position-absolute top-50 start-50 translate-middle">
    <div class="card border-primary mt-5">
        <div class="card-header bg-primary text-white">
            <h2>Création de compte</h2>
        </div>
        <section >
            @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li> <br>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
            
                        </button>
                    </div>
                    @endif
                    <section>
                        @if(session("success"))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Message de succès</strong> <br> {{session("success")}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
                                </button>
                            </div>
                        @endif
                        </section>
        <div class="card-body ">
            <form action="{{route("storeUser")}}" method="POST" enctype="multipart/form-data"  autocomplete="off">
                @csrf
                <div class="form-group mb-3">
               <label for="" class="form-label fs-5">Nom</label>
               <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-5">Prénom</label>
                    <input  type="text" class="form-control" name="prenom" placeholder="Entrer votre prénom">
                     </div>
                     
                     <div class="form-group mb-3">
                        <label for="birthday" class="form-label fs-5">Date de naissance</label>
                        <input  type="date" class="form-control" name="birthday" >
                         </div>

                     <div class="form-group mb-3">
                        <label for="" class="form-label fs-5">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Entrer votre email">
                         </div>
         

                <div class="form-group mb-3">
                    <label for="" class="form-label fs-5">  Mot de passe </label>
                    <input required type="password" class="form-control" name="password" placeholder="Entrer votre mot de passe">
                     </div>

                     <div class="form-group mb-3">
                    <label for="" class="form-label fs-5">  Confirmation de mot de passe </label>
                    <input required type="password" class="form-control" name="password_confirmation" placeholder="Confirmer votre mot de passe" >
                     </div>

                     <button class="btn-primary btn float-end fs-5" type="submit">S'inscrire</button>
                     <p class="fs-6">Vous avez déjà un compte ? <a href="{{route('login')}}"Cliquez ici>Se connecter</a></p>
            </form>
            
        </div>
    </div>
</div>
</section>
@endsection