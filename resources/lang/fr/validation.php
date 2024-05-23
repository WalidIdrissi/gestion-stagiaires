<?php

return [
    'required' => 'Le champ :attribute est obligatoire.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'date' => 'Le champ :attribute doit être une date valide.',
    'max' => [
        'numeric' => 'Le champ :attribute ne peut pas être supérieur à :max.',
    ],
    // Ajoutez d'autres traductions ici...
    'attributes' => [
        'nom' => 'nom',
        'prenom' => 'prénom',
        'email' => 'adresse email',
        'telephone' => 'téléphone',
        'adresse' => 'adresse',
        'ville' => 'ville',
        'ecole' => 'école',
        'demande_stage' => 'demande de stage',
        'attestation_assurance' => 'attestation d\'assurance',
        'photo' => 'photo',
        'cv' => 'CV',
        'formateur' => 'formateur',
        'date_debut' => 'date de début',
        'date_fin' => 'date de fin',
        'projet' => 'projet',
        'stagiaire_id' => 'ID du stagiaire',
        'encadrant_id' => 'ID de l\'encadrant',
        'description' => 'description',
        'unique' => 'L\'adresse email :attribute est déjà utilisée.',
        'failed' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
        'note_globale' => 'note globale',
    ],
    'after_or_equal' => [
        'date' => 'La date de fin doit être postérieure à la date de début.',
    ],

];
