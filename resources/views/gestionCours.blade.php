@extends('layout')

@section('content')
 


    @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
             <br>
             <h3 class="text-center">
              {{session("success")}}
             </h3>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
            
        @endif

        @if (session("error"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <br>
             <h3 class="text-center">
              {{session("error")}}
             </h3>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
            
        @endif

        <div>
          <div class="row">
            <h4 class="text-center">Liste des cours</h4>
            <div class="text-end d-inline-block">
                <a href="/ajout_categorie"><button type="button" class="btn btn-primary">Ajouter une catégorie</button></a>
                <a href="/ajout_cours"><button type="button" class="btn btn-primary">Ajouter un cours</button></a>
                <a href="/attribuer_cours"><button type="button" class="btn btn-primary">Attribuer un cours</button></a>
            </div>
          </div>
          
          
          <br>

          <table border="1" class="table">
              <thead>
                  <tr>
                      <th scope="col">Nom cours</th>
                      <th scope="col">Masse horaire</th>
                      <th scope="col">Coefficient</th>
                      <th class="text-center" scope="col">Actions </th>
                  </tr>
              </thead>
              @if (@isset($tableaux))
                      <tbody>
                          @foreach ($tableaux as $item)
                          <tr>
                
                              <td>{{ $item ['nom_cours'] }}</td>
                              <td>{{ $item ['masse_horaire'] }}</td>
                              <td>{{ $item ['coef'] }}</td>
                              <td class="text-center" scope="col">
                                  <div class=" btn-group">
                                      {{-- <a href="{{route('indexWithId',['id'=>$item['id']])}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" >Voir Plus   </button>
                                      </a> --}}
                                      <a href="{{route('update',['id'=>$item['id']])}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                                      </a>
                                      <a href="{{route('delete',['id'=>$item['id']])}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Supprimer</button>
                                      </a>
                                  </div>
                              </td>  
                            </tr>
                            @endforeach
                      </tbody>
              @endif
      
          </table>
        </div>
    @endsection 
  

