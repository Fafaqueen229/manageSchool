@extends('layout')

@section('content')
<style>
    /* Ajoutez ce CSS dans votre fichier de style CSS (par exemple, styles.css) */

    /* Style de bordure pour le tableau */
    table {
        border-collapse: collapse; /* Fusionne les bordures adjacentes en une seule */
        width: 100%; /* Largeur du tableau */
    }

    /* Style de bordure pour les cellules de tableau */
    table, th, td {
        border: 1px solid #dddddd; /* Couleur et épaisseur de la bordure */
        text-align: left; /* Alignement du texte dans les cellules */
        padding: 8px; /* Espacement interne des cellules */
    }

    /* Style de la première ligne du tableau (éventuellement pour les en-têtes) */
    table th {
        background-color: #f2f2f2; /* Couleur d'arrière-plan */
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Tableau des attributions -->
            <h2 class="text-center">Liste des attributions</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id affec</th>
                        <th>Étudiant</th>
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
                                <h3>{{ $etudiants->find($etudiantId)->nom }} {{ $etudiants->find($etudiantId)->prenom }}</h3>
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
            <form method="POST" action="{{ route('attributions.store') }}">
                @csrf
                <div class="form-group">
                    <label for="etudiant_id">Étudiant</label>
                    <select class="form-control" id="etudiant_id" name="etudiant_id" required>
                        @foreach ($etudiants as $etudiant)
                            <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cours_id">Cours (sélection multiple)</label>
                    <select class="form-control" id="cours_id" name="cours_id[]" multiple required>
                        @foreach ($cours as $coursItem)
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
