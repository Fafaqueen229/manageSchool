@extends ('layout')
@section('content')


<div style="width: 600px" class="container position-absolute top-50 start-50 translate-middle">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white">
            <h2>Mot de passe oublié</h2>
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
            <form action="{{route('storePwd')}}" method="POST"  autocomplete="off">
                @csrf
                
            <div class="form-group mb-3">
               <label for="" class="form-label">Email</label>
               <input type="email" class="form-control" name="email" placeholder="saisir votre email">
               <a href="{{route('login')}}">Retour</a>
                
            </div>

            <button class="btn-primary btn float-end" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
        
</div>
    