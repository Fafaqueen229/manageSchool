@extends ('layout')
@section('content')
    

    <section class=" text-center">
        <h1 style="color:#050542" class="text-center mb-3">Liste des étudiants</h1>
        <div class="container">
            <section class="d-flex justify-content-center  py-2">
                <a href="{{route('created')}}" class="btn btn-sm btn-primary  text-white border border-white fs-5" >Ajouter un étudiant</a>
                <a href="/index" class="btn btn-sm btn-primary mx-2 text-white border border-white fs-5" >Gestion des enseignants</a>
                <a href="/gestionCours" class="btn btn-sm btn-primary mx-2 text-white border border-white fs-5" >Gestion des cours</a>
                <a href="" class="btn btn-sm btn-primary mx-2 text-white border border-white fs-5" >Attribution des cours</a>
            </section>
            
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
    <div class="mt-3">
        <table class="table-bordered " width="100%">
            <thead class="border-2 bg-dark text-white fs-5">
                <tr>
                    <th  class="px-2 py-2">id</th>
                    <th class="px-2 py-2">Photo</th>
                    <th class="px-2 py-2">Nom</th>
                    <th class="px-2 py-2">Prénoms</th>
                    <th class="px-2 py-2">Spécialités</th>
                    <th class="px-2 py-2">Hobbies</th>
                    <th class="px-2 py-2">Actions</th>
                    <th class="px-2 py-2">Statut</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($students as $etudiant)
                   <tr class="{{$etudiant->statut==0 ? '' : 'table-secondary'}}">
                       <td>{{$etudiant['id']}}</td>
                       <td><img style=" width:60px ; height:60px " src="{{asset('avatar/'.$etudiant->file)}}" ></td>
                       <td>{{$etudiant  ['lastname'] }}</td>
                       <td>{{$etudiant ['firstname'] }}</td>
                       <td style="color:darkblue; font-weight:bold;">{{$etudiant ['speciality'] }}</td>
                       <td>{{$etudiant['hobbies'] }}</td>
                       <td class=" mt-3">
                        
                         @if ($etudiant-> statut == 0)
                             <a  href="{{route('details',['id'=>$etudiant->id])}}" >
                                <button class="btn btn-sm btn-info "  > Voir +</button>
                            </a>

                            <a href="{{route('update',['id'=>$etudiant->id])}}">
                                <button class="btn btn-sm btn-primary ">Modifier  </button>
                             </a>

                              <a href="{{route('delete',['id'=>$etudiant->id])}}"> 
                                <button  class="btn btn-sm btn-danger "  >  Supprimer </button > 
                            </a>
                            @else 
                            <button disabled class="btn btn-sm btn-info "> Voir +</button>
                            <button disabled class="btn btn-sm btn-primary ">Modifier  </button>
                            <button disabled class="btn btn-sm btn-danger ">  Supprimer </button > 
                                @endif
                          
                    </td>
                     
                       <td class=" mt-3"> 
                        <form action="{{route('activate' , ['id'=>$etudiant->id])}}" method="POST">
                        @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-success "> {{$etudiant->statut==0 ? 'Désactiver' : 'Activer'}} </button>
                    
                    </form>
                    </td>

                   </tr>
                   @endforeach
               </tbody>
    </table>
    <div class="pagination mt-3">
        {!! $students->links() !!}
    </div>

    </div>
    @endsection
