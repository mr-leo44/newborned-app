<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Child;
use App\Models\Parents;
use Illuminate\Http\Request;
use App\Http\Resources\ParentResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ParentController extends Controller
{

    public function index()
    {
        $parents = ParentResource::collection(Parents::latest()->get());
        return Inertia::render("Parents/Index", compact("parents"));
    }

    public function create() 
    {
        return Inertia::render("Parents/Create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'father_name' => ['required','min:3'],
            'mother_name' => ['required','min:3'],
            'father_id' => ['required', 'image','file'],
            'mother_id' => ['required', 'image','file'],
            'wedding_act' => ['image','file'],
        ]);
        $father_id = "";
        $mother_id = "";
        $wedding_act = "";
        
        if($request->hasFile('father_id')) {
            $father_id = $request->file('father_id')->store('parents/ids');
        }

        if($request->hasFile('mother_id')) {
            $mother_id = $request->file('mother_id')->store('parents/ids');
        }

        if($request->hasFile('wedding_act')) {
            $wedding_act = $request->file('wedding_act')->store('parents/acts');
        }

        Parents::create([
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'father_id' => $father_id,
            'mother_id' => $mother_id,
            'wedding_act' => $wedding_act ?? null,
        ]);

        return Redirect::route('parents.index')->with('success','Parents créés avec succès');
    }

    public function show(Parents $parent)
    {
        $children = Child::where('parents_id', $parent->id)->get();
        return Inertia::render("Parents/Show", compact("parent", "children"));
    }

    public function edit(Parents $parent)
    {
        return Inertia::render("Parents/Edit", compact("parent"));
    }

    public function update(Request $request, Parents $parent)
    {
        $father_id = $parent->father_id;
        $mother_id = $parent->mother_id;
        $wedding_act = $parent->wedding_act;

        $request->validate([
            'father_name' => ['min:3'],
            'mother_name' => ['min:3'],
        ]);

        
        if($request->hasFile('father_id')) {
            $request->validate(['father_id' => ['file', 'image']]);
            Storage::delete($parent->father_id);
            $father_id = $request->file('father_id')->store('parents/ids');
        }

        if($request->hasFile('mother_id')) {
            $request->validate(['mother_id' => ['file', 'image']]);
            Storage::delete($parent->mother_id);
            $mother_id = $request->file('mother_id')->store('parents/ids');
        }

        if($request->hasFile('wedding_act')) {
            $request->validate(['wedding_act' => ['file', 'image']]);
            Storage::delete($parent->wedding_act);
            $wedding_act = $request->file('wedding_act')->store('parents/acts');
        }

        $parent->update([
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'father_id' => $father_id,
            'mother_id' => $mother_id,
            'wedding_act' => $wedding_act,
        ]);

        return Redirect::route('parents.index')->with('success','Parents mis à jour avec succès');
    }

    
    public function destroy(Parents $parent)
    {
        Storage::delete([$parent->wedding_act, $parent->mother_id, $parent->father_id]);
        $parent->delete();

        return Redirect::route('parents.index')->with('success','Parents supprimés avec succès');

    }
}
 