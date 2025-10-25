<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil user yang sedang login dari $request
        // Cara ini 100% "dikenali" oleh IDE dan PHP
        $user = $request->user(); 
        
        // Ambil project milik user tersebut
        // 'with('milestones')' adalah eager loading, sangat bagus
        // FIX 2: 'projects' (plural), bukan 'project' (singular)
        $projects = $user->projects()->with('milestones')->get();

        // Kirim data projects ke view 'projects.index'
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
