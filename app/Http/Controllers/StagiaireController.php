<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Demande;


class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaire.index', compact('stagiaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $demandes = Demande::all();
        return view('stagiaire.create', compact('demandes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'demande_id' => 'required|integer|min:0',
        ]);

        $stagiaire = Stagiaire::create($request->all());

        return redirect()->route('stagiaire.index')->with('success', 'Stagiaire créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        return view('stagiaire.show', compact('stagiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        $demandes = Demande::all();
        return view('stagiaire.edit', compact('stagiaire','demandes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'demande_id' => 'required|integer|min:0',
        ]);

        $stagiaire->update($request->all());

        return redirect()->route('stagiaire.index')->with('modif', 'Stagiaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        return redirect()->route('stagiaire.index')->with('supp', 'Stagiaire supprimé avec succès.');
    }

}
