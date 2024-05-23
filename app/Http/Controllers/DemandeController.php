<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stagiaire;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::orderBy('created_at', 'desc')->get();
        // $demandes = Demande::all();
        return view('demande.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('demande.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'email' => 'required|email|unique:demandes,email',
            'telephone' => 'required|string|max:255',
            'ecole' => 'required|string|max:255',
            'demande_stage' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'attestation_assurance' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'formateur' => 'required|string|max:255',
        ],[
            'email.unique' => 'L\'adresse email est déjà utilisée.',
        ]);

        $photoFilename = null;
        $photoPath = 'uploads/photo';
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoExtension = $photoFile->getClientOriginalExtension();
            $photoFilename = time() . '_photo.' . $photoExtension;
            $photoFile->move($photoPath, $photoFilename);
        }
        $cvFilename = null;
        $cvPath = 'uploads/cv';
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvExtension = $cvFile->getClientOriginalExtension();
            $cvFilename = time() . '_cv.' . $cvExtension;
            $cvFile->move($cvPath, $cvFilename);
        }
        $attestation_assuranceFilename = null;
        $attestation_assurancePath = 'uploads/attestation_assurance';
        if ($request->hasFile('attestation_assurance')) {
            $attestation_assuranceFile = $request->file('attestation_assurance');
            $attestation_assuranceExtension = $attestation_assuranceFile->getClientOriginalExtension();
            $attestation_assuranceFilename = time() . '_attestation_assurance.' . $attestation_assuranceExtension;
            $attestation_assuranceFile->move($attestation_assurancePath, $attestation_assuranceFilename);
        }
        $demande_stageFilename = null;
        $demande_stagePath = 'uploads/demande_stage';
        if ($request->hasFile('demande_stage')) {
            $demande_stageFile = $request->file('demande_stage');
            $demande_stageExtension = $demande_stageFile->getClientOriginalExtension();
            $demande_stageFilename = time() . '_demande_stage.' . $demande_stageExtension;
            $demande_stageFile->move($demande_stagePath, $demande_stageFilename);
        }

        $demande = new Demande([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'ecole' => $request->ecole,
            'demande_stage' => $demande_stageFilename,
            'attestation_assurance' => $attestation_assuranceFilename,
            'photo' => $photoFilename,
            'cv' => $cvFilename,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'formateur' => $request->formateur,
        ]);

        $demande->save();
        return redirect()->route('demande.index')->with('success', 'demande créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        return view('demande.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        return view('demande.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Demande $demande , Stagiaire $stagiaire)
    {
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
        ],[
            'email.unique' => 'L\'adresse email est déjà utilisée.',
        ]);

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

        $demande->save();

        return redirect()->route('stagiaire.index')->with('modif', 'stagiaire mis à jour avec succès.');
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
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demande.index')->with('supp', 'demande supprimé avec succès.');
    }

    public function validateDemande($id)
    {
        $demande = Demande::findOrFail($id);

        // Vérifier si la demande n'a pas déjà été validée
        if ($demande->statut !== 'valide') {
            $demande->update(['statut' => 'valide']);

            $stagiaire = Stagiaire::create([
                'demande_id' => $demande->id,
            ]);

            if ($stagiaire) {
                return redirect()->route('stagiaire.index')->with('success', 'Demande validée avec succès.');
            } else {
                return redirect()->back()->with('error', 'Erreur de la validation de la demande.');
            }
        } else {
            return redirect()->back()->with('error', 'Cette demande a déjà été validée.');
        }
    }


}
