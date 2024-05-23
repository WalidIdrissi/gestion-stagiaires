<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Encadrant;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stagiaires = Stagiaire::all();
        $encadrants = Encadrant::all();
        return view('evaluations.create', compact('stagiaires', 'encadrants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stagiaire_id' => 'required',
            'encadrant_id' => 'required',
            'note_globale' => 'required|numeric|min:0|max:10',
            'date_evaluation' => 'required|date',
        ]);

        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Evaluation de stage créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        $stagiaires = Stagiaire::all();
        $encadrants = Encadrant::all();
        return view('evaluations.edit', compact('evaluation', 'stagiaires', 'encadrants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'stagiaire_id' => 'required',
            'encadrant_id' => 'required',
            'note_globale' => 'required|numeric|min:0|max:10',
            'date_evaluation' => 'required|date',
        ]);

        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')->with('modif', 'Evaluation de stage mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return redirect()->route('evaluations.index')->with('supp', 'Evaluation de stage supprimée avec succès.');
    }
}
