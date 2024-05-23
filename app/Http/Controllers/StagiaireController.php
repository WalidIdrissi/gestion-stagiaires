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
        $demande = $stagiaire->demande;
        return view('stagiaire.edit', compact('stagiaire', 'demande'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Stagiaire $stagiaire)
    // {
    //     $request->validate([
    //         'demande_id' => 'required|integer|min:0',
    //     ]);

    //     $stagiaire->update($request->all());

    //     return redirect()->route('stagiaire.index')->with('modif', 'Stagiaire mis à jour avec succès.');
    // }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, Stagiaire $stagiaire)
     {
         $demande = $stagiaire->demande;

         $request->validate([
             'nom' => 'required|string',
             'prenom' => 'required|string',
             'adresse' => 'required|string|max:255',
             'ville' => 'required|string|max:255',
             'email' => 'required|email|unique:demandes,email,' . $demande->id,
             'telephone' => 'required|string|max:255',
             'ecole' => 'required|string|max:255',
             'demande_stage' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
             'attestation_assurance' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'cv' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
             'date_debut' => 'required|date',
             'date_fin' => 'required|date|after_or_equal:date_debut',
             'formateur' => 'required|string|max:255',
         ], [
             'email.unique' => 'L\'adresse email est déjà utilisée.',
         ]);

         // Mise à jour des informations de la demande
         $demande->update([
             'nom' => $request->input('nom'),
             'prenom' => $request->input('prenom'),
             'adresse' => $request->input('adresse'),
             'ville' => $request->input('ville'),
             'email' => $request->input('email'),
             'telephone' => $request->input('telephone'),
             'ecole' => $request->input('ecole'),
             'date_debut' => $request->input('date_debut'),
             'date_fin' => $request->input('date_fin'),
             'formateur' => $request->input('formateur'),
         ]);

         $this->updateFile($request, 'photo', $demande);
         $this->updateFile($request, 'cv', $demande);
         $this->updateFile($request, 'attestation_assurance', $demande);
         $this->updateFile($request, 'demande_stage', $demande);

         return redirect()->route('stagiaire.index')->with('modif', 'Stagiaire mis à jour avec succès.');
     }

     private function updateFile(Request $request, $field, $demande)
     {
         if ($request->hasFile($field)) {
             $file = $request->file($field);
             $path = 'uploads/' . $field;
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move($path, $filename);
             $demande->$field = $filename;
             $demande->save();
         }
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
