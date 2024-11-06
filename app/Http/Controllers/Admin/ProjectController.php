<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_admin) {
            $projects = Project::all();
            return view('admin.projects.index', compact('projects'));
        }

        if (Auth::user()->is_moderator) {
            $projects = Project::all();
            return view('admin.projects.index', compact('projects'));
        }


        return redirect('/')->with('error', 'Accesso negato, non possiedi i privilegi adatti per questa funzione');
    }

    public function create()
{
    if (!Auth::user()->is_admin) {
        return redirect()->route('admin.projects.index')->with('error', 'Accesso negato, non possiedi i privilegi adatti per questa funzione');
    }

    return view('admin.projects.create');
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('admin.projects.index')->with('error', 'Accesso negato, non possiedi i privilegi adatti per questa funzione');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url',
        ]);

        Project::create($validatedData);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    $project = Project::findOrFail($id);

    return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

    return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);

    if (!Auth::user()->is_admin && !Auth::user()->is_moderator) {
        return redirect()->route('admin.projects.index')->with('error', 'Accesso negato, non possiedi i privilegi adatti per questa funzione');
    }

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'url' => 'nullable|url',
    ]);

    $project->update($validatedData);

    return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        if (!Auth::user()->is_admin) {
            return redirect()->route('admin.projects.index')->with('error', 'Accesso negato, non possiedi i privilegi adatti per questa funzione');
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}
