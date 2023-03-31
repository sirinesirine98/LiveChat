@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des rendez-vous</h1>
        <a href="{{ route('rendezvous.create') }}" class="btn btn-primary mb-3">Ajouter un rendez-vous</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rendezVous as $rdv)
                    <tr>
                        <td>{{ $rdv->id }}</td>
                        <td>{{ $rdv->nom }}</td>
                        <td>{{ $rdv->date }}</td>
                        <td>{{ $rdv->heure }}</td>
                        <td>
                            <form action="{{ route('rendezvous.destroy', $rdv->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
