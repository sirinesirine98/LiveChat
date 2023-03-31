<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;


class RendezVousController extends Controller
{
    public function index()
    {
        $rendezVous = RendezVous::all();
        return view('rendezvous.index', ['rendezVous' => $rendezVous]);
    }

    public function create()
    {
        return view('rendezvous.create');
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:rendezvous'],
            'date' => ['required', 'date'],
            'heure' => ['required', 'string', Rule::in(['9h', '10h', '11h', '14h', '15h', '16h'])],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('rendezvous.create')
                ->withErrors($validator)
                ->withInput();
        }

        $rendezvous = new RendezVous();
        $rendezvous->nom = $request->nom;
        $rendezvous->email = $request->email;
        $rendezvous->date = $request->date;
        $rendezvous->heure = $request->heure;
        $rendezvous->save();

        return redirect()
            ->route('rendezvous.index')
            ->with('success', 'Le rendez-vous a été créé avec succès.');
    }
     public function destroy($id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        $rendezvous->delete();

        return redirect()
            ->route('rendezvous.index')
            ->with('success', 'Le rendez-vous a été supprimé avec succès.');
    }
}
