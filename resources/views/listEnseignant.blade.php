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
            <h4 class="text-center">Liste des enseignants</h4>
            <div class="text-end d-inline-block">
                <a href="/addProf"><button type="button" class="btn btn-primary">Ajouter un enseignant</button></a>
            </div>
          </div>
          
          
          <br>

          <table border="1" class="table">
              <thead>
                  <tr>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenoms</th>
                      <th scope="col">Tel</th>
                      <th scope="col">Adresse</th>
                      <th class="text-center" scope="col">Actions </th>
                  </tr>
              </thead>
              @if (@isset($tableaux))
                      <tbody>
                          @foreach ($tableaux as $item)
                          <tr>
                             <!--  {{--  <th {{ $item['id'] }} scope="row"></th> --}} -->
                              <td>{{ $item ['firstname'] }}</td>
                              <td>{{ $item ['lastname'] }}</td>
                              <td>{{ $item ['tel'] }}</td>
                              <td>{{ $item ['adresse'] }}</td>
                              <td class="text-center" scope="col">
                                  <div class=" btn-group">
                                      <a href="{{route('assigne_enseignant',['id'=>$item['id']])}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" >Affecter cours  </button>
                                      </a>
                                      <a href="{{route('update_enseignant',['id'=>$item['id']])}}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                                      </a>
                                      <a href="{{route('delete_enseignant',['id'=>$item['id']])}}">
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
 

