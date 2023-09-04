@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Tableau des attributions -->
            <h2 class="text-center">Liste des attributions</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id affec</th>
                        <th>Professeur</th>
                        <th>Cours associés</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($attributions as $etudiantId => $etudiantAttributions)
                        <tr>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                <h3>{{ $enseignants->find($etudiantId)->nom }} {{ $enseignants->find($etudiantId)->prenom }}</h3>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($etudiantAttributions as $attribution)
                                        <li>{{ $attribution->cours->nom_cours }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @php
                        $i = $i +1;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="col-md-6 p-5">
            <!-- Formulaire d'attribution -->
            <h2 class="text-center">Attribuer un cours</h2>
            <form method="POST" action="{{ route('enseignants.attributions') }}">
                @csrf
                <div class="form-group">
                    <label for="etudiant_id">Enseignant : </label>
                    <strong>{{ $enseignant->nom }} {{ $enseignant->prenom }}</strong>
                    <input type="hidden" name="enseignant_id" value="{{ $enseignant->id }}">
                </div>
                <div class="form-group">
                    <label for="cours_id">Cours (sélection multiple)</label>
                    <select class="form-control" id="cours_id" name="cours_id[]" multiple required>
                        @foreach ($courses as $coursItem)
                            <option value="{{ $coursItem->id }}">{{ $coursItem->nom_cours }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center pt-2">
                    <button type="submit" class="btn btn-primary">Attribuer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
