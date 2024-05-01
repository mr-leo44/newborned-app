<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ParentController extends Controller
{

    public function index()
    {
        $parents = Parents::all();
        return Inertia::render("parents/Index", compact("parents"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'father_name' => ['required','string'],
            'mother_name' => ['required','string'],
            'father_id' => ['required','string', 'image|file'],
            'mother_id' => ['required','string', 'image|file'],
            'wedding_act' => ['required','string', 'image|file'],
        ]);

        $parents = Parents::create($request->all());
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
