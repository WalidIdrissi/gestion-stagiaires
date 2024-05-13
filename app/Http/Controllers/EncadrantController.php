<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EncadrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encadrants = Encadrant::all();
        return view('encadrant.index', compact('encadrants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('encadrant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:encadrants,email',
            'telephone' => 'required|string|max:255',
        ],[
            'email.unique' => 'L\'adresse email est déjà utilisée.',
        ]);

        Encadrant::create($request->all());

        return redirect()->route('encadrant.index')->with('success', 'Encadrant ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Encadrant $encadrant)
    {
        return view('encadrant.show', compact('encadrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encadrant $encadrant)
    {
        return view('encadrant.edit', compact('encadrant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encadrant $encadrant)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:encadrants,email,' . $encadrant->id,
            'telephone' => 'required|string|max:255',
        ],[
            'email.unique' => 'L\'adresse email est déjà utilisée.',
        ]);

        $encadrant->update($request->all());

        return redirect()->route('encadrant.index')->with('modif', 'Encadrant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encadrant $encadrant)
    {
        $encadrant->delete();
        return redirect()->route('encadrant.index')->with('supp', 'Encadrant supprimé avec succès.');
    }
}
