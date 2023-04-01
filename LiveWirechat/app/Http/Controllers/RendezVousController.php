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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $rendezVous = new RendezVous;
        $rendezVous->title = $validatedData['title'];
        $rendezVous->description = $validatedData['description'];
        $rendezVous->start_time = $validatedData['start_time'];
        $rendezVous->end_time = $validatedData['end_time'];
        $rendezVous->save();

        return redirect()->route('rendezvous.index');
    }
}
