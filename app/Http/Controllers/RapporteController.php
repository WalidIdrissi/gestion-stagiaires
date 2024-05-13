<?php

namespace App\Http\Controllers;

use App\Models\Rapporte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stagiaire;
class RapporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapportes = Rapporte::all();
        return view('rapporte.index', compact('rapportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stagiaires = Stagiaire::all();
        return view('rapporte.create', compact('stagiaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'stagiaire_id' => 'required|integer|min:0',
        'contenu' => 'required',
        'fichiercontenu' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
    ]);

    $fichiercontenuFilename = null;
    $fichiercontenuPath = 'uploads/fichiercontenu';
    if ($request->hasFile('fichiercontenu')) {
        $fichiercontenuFile = $request->file('fichiercontenu');
        $fichiercontenuExtension = $fichiercontenuFile->getClientOriginalExtension();
        $fichiercontenuFilename = time() . '_fichiercontenu.' . $fichiercontenuExtension;
        $fichiercontenuFile->move($fichiercontenuPath, $fichiercontenuFilename);
    }

    $rapporte = new Rapporte();
    $rapporte->stagiaire_id = $request->input('stagiaire_id');
    $rapporte->date = now();
    $rapporte->contenu = $request->input('contenu');
    $rapporte->fichiercontenu = $fichiercontenuFilename;
    $rapporte->save();

    return redirect()->route('rapporte.index')->with('success', 'rapporte créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rapporte $rapporte)
    {
        return view('rapporte.show', compact('rapporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rapporte $rapporte)
    {
        $stagiaires = Stagiaire::all();
        return view('rapporte.edit', compact('rapporte','stagiaires'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rapporte $rapporte)
    {
        $request->validate([
            'stagiaire_id' => 'required|integer|min:0',
            'contenu' => 'required',
        ]);

        $fichiercontenuFilename = $rapporte->fichiercontenu; // Conserver le nom du fichier actuel par défaut
        $fichiercontenuPath = 'uploads/fichiercontenu';
        if ($request->hasFile('fichiercontenu')) {
            $fichiercontenuFile = $request->file('fichiercontenu');
            $fichiercontenuExtension = $fichiercontenuFile->getClientOriginalExtension();
            $fichiercontenuFilename = time() . '_fichiercontenu.' . $fichiercontenuExtension;
            $fichiercontenuFile->move($fichiercontenuPath, $fichiercontenuFilename);
        }

        // if (!$rapporte->date) {
        //     $rapporte->update(['date' => now()]);
        // }

        $rapporte->update([
            'stagiaire_id' => $request->input('stagiaire_id'),
            'date' => now(),//
            'contenu' => $request->input('contenu'),
            'fichiercontenu' => $fichiercontenuFilename,
        ]);


        return redirect()->route('rapporte.index')->with('modif', 'rapporte mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rapporte $rapporte)
    {
        $rapporte->delete();
        return redirect()->route('rapporte.index')->with('supp', 'rapporte supprimé avec succès.');
    }
}
