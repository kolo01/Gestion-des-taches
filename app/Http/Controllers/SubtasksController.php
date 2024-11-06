<?php

namespace App\Http\Controllers;

use App\Models\subtasks;
use App\Http\Requests\StoresubtasksRequest;
use App\Http\Requests\UpdatesubtasksRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SubtasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retourner la vue de la page de l'index avec des datas et une pagination, du coup nos données seront representer sur 3 pages
        //Les donnees sont retournées vers la page d'index en mode
        return view('subtasks.index', [
            'subtasks' => subtasks::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //retourne la vue pour la creation de la tache,
        return view('subtasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresubtasksRequest $request): RedirectResponse
    {
        //creation d'une nouvelle tache et redirection vers la page d'index
        subtasks::create($request->all());
        return redirect()->route('subtasks.index')
            ->withSuccess('Nouvelle sous-tâche ajoutée avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(subtasks $subtasks): view
    {

        //retourne la vue pour afficher une tache spécifique, avec les données de la tache en question
        //la tache est passée en argument de la fonction pour que nous puissions la récupérer dans la vue ici.


        return view('subtasks.show', compact('subtasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subtasks $subtasks): View
    {
        //

        return view('subtasks.edit', compact('subtasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesubtasksRequest $request,  $id): RedirectResponse
    {
        //


        $subtasks = subtasks::find($id);
        $subtasks->update($request->all());

        // dd($request->validated());
        return redirect()->route('subtasks.index')
            ->withSuccess('Sous-Tâche mise à jour avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id): RedirectResponse
    {
        //
        $subtasks = subtasks::find($id);
        $subtasks->delete();
        return redirect()->route('subtasks.index')
            ->withSuccess('Sous-Tâche supprimée.');
    }
}
