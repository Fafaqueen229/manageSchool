@extends('layout')
@section('content')
    <br>
    <div class="container">
        <h1 class="text-center">Ajouter une catégorie</h1>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('store_category') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="name">Nom de la catégorie : </label>
                    <input required class="form-control" type="text" name="name" id="name">
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary mt-3" type="submit">Enregistrer la catégorie</button>
            </div>
        </form>
    </div>
@endsection
