<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Http\Requests\StoretasksRequest;
use App\Http\Requests\UpdatetasksRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retourner la vue de la page de l'index avec des datas et une pagination, du coup nos données seront representer sur 3 pages
        //Les donnees sont retournées vers la page d'index en mode
        return view('tasks.index', [
            'tasks' => tasks::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //retourne la vue pour la creation de la tache,
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretasksRequest $request): RedirectResponse
    {
        //creation d'une nouvelle tache et redirection vers la page d'index
        tasks::create($request->all());
        return redirect()->route('tasks.index')
            ->withSuccess('Nouvelle tâche ajoutée avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tasks $task): view
    {

        //retourne la vue pour afficher une tache spécifique, avec les données de la tache en question
        //la tache est passée en argument de la fonction pour que nous puissions la récupérer dans la vue ici.


        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tasks $task): View
    {
        //

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetasksRequest $request,  $id): RedirectResponse
    {
        //


        $task = tasks::find($id);
        $task->update($request->all());

        // dd($request->validated());
        return redirect()->route('tasks.index')
            ->withSuccess('Tâche mise à jour avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id): RedirectResponse
    {
        //
        $task = tasks::find($id);
        $task->delete();
        return redirect()->route('tasks.index')
            ->withSuccess('Tâche supprimée.');
    }
}
