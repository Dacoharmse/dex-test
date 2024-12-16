<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a single project by contract address.
     */
    public function showByContract($contractAddress)
    {
        $project = Project::where('contract_address', $contractAddress)->firstOrFail();
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form to create a new project (ICO).
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a new project in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image',
            'usd_price' => 'required|numeric',
            'contract_address' => 'required|string|max:255|unique:projects,contract_address',
        ]);

        $project = new Project($validatedData);

        if ($request->hasFile('logo')) {
            $project->logo = $request->file('logo')->store('logos', 'public');
        }

        $project->save();

        return redirect()->route('home.index')->with('success', 'Project created successfully!');
    }

    /**
     * Boost a project by its ID.
     */
    public function boost($projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->boosts += 1;
        $project->save();

        return response()->json(['success' => true, 'message' => 'Boost added successfully!']);
    }

    /**
     * Vote for a project by its ID.
     */
    public function vote($projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->votes += 1;
        $project->save();

        return response()->json(['success' => true, 'message' => 'Vote added successfully!']);
    }

    /**
     * Flag a project by its ID.
     */
    public function flag($projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->flags += 1;
        $project->save();

        return response()->json(['success' => true, 'message' => 'Project flagged successfully!']);
    }

    /**
     * Shit a project by its ID.
     */
    public function shit($projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->shits += 1;
        $project->save();

        return response()->json(['success' => true, 'message' => 'Shit added successfully!']);
    }
}
