<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Parents;
use Illuminate\Http\Request;
use App\Http\Resources\ParentResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
            'wedding_act' => ['required', 'image','file'],
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
            'wedding_act' => $wedding_act,
        ]);

        return Redirect::route('parents.index')->with('success','Parents mis à jour avec succès');
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
            'father_name' => ['required','min:3'],
            'mother_name' => ['required','min:3'],
            'father_id' => ['required', 'image|file'],
            'mother_id' => ['required', 'image|file'],
            'wedding_act' => ['required', 'image|file'],
        ]);

        
        if($request->hasFile('father_id')) {
            Storage::delete($parents->father_id);
            $father_id = $request->file('father_id')->store('parents/ids');
        }

        if($request->hasFile('mother_id')) {
            Storage::delete($parents->mother_id);
            $mother_id = $request->file('mother_id')->store('parents/ids');
        }

        if($request->hasFile('wedding_act')) {
            Storage::delete($parents->wedding_act);
            $wedding_act = $request->file('wedding_act')->store('parents/acts');
        }

        $parents->update([
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'father_id' => $father_id,
            'mother_id' => $mother_id,
            'wedding_act' => $wedding_act,
        ]);

        return Redirect::route('parents.index')->with('success','Parents créés avec succès');
    }

    
    public function destroy(Parents $parents)
    {
        Storage::delete($parents->wedding_act, $parents->mother_id, $parents->father_id);
        $parents->delete();

        return Redirect::route('parents.index')->with('success','Parents supprimés avec succès');

    }
}
 