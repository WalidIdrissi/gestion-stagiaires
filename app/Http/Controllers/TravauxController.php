<?php

namespace App\Http\Controllers;

use App\Models\Travaux;
use App\Models\Stagiaire;
use App\Models\Encadrant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravauxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travaux = Travaux::all();
        return view('travaux.index', compact('travaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stagiaires = Stagiaire::all();
        $encadrants = Encadrant::all();
        return view('travaux.create', compact('stagiaires','encadrants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projet' => 'required|string|max:255',
            'stagiaire_id' => 'required|integer|min:0',
            'encadrant_id' => 'required|integer|min:0',
            // 'date_debut' => 'required|date',
            // 'date_fin' => 'required|date|after_or_equal:date_debut',
            'description' => 'required|string|max:255',
        ]);

        $travaux = Travaux::create($request->all());

        return redirect()->route('travaux.index')->with('success', 'Travaux créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Travaux $travaux)
    {
        return view('travaux.show', compact('travaux'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travaux $travaux)
    {
        $stagiaires = Stagiaire::all();
        $encadrants = Encadrant::all();
        return view('travaux.edit', compact('travaux', 'stagiaires', 'encadrants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Travaux $travaux)
    {
        $request->validate([
            'projet' => 'required|string|max:255',
            'stagiaire_id' => 'required|integer|min:0',
            'encadrant_id' => 'required|integer|min:0',
            // 'date_debut' => 'required|date',
            // 'date_fin' => 'required|date|after_or_equal:date_debut',
            'description' => 'required|string|max:255',
        ]);

        $travaux->update($request->all());

        return redirect()->route('travaux.index')->with('modif', 'Travaux mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travaux $travaux)
    {
        $travaux->delete();
        return redirect()->route('travaux.index')->with('supp', 'Travaux supprimé avec succès.');
    }
}
