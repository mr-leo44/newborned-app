<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Child;
use App\Models\Parents;
use Illuminate\Http\Request;
use App\Http\Resources\ChildResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ChildController extends Controller
{

    public function index()
    {
        $children = ChildResource::collection(Child::with('parents')->get());
        return Inertia::render("Child/Index", compact("children"));
    }

    public function create() 
    {
        return Inertia::render("Child/Create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required','min:3'],
            'middlename' => ['required','min:3'],
            'lastname' => ['required', 'min:3'],
            'birthday' => ['required', 'min:3'],
            'city' => ['required'],
            'hospital_act' => ['required', 'image|file'],
            'parents_id' => ['required'],
        ]);

       
        if($request->hasFile('mother_id')) {
            $hospital_act = $request->file('hospital_act')->store('childs');
            Child::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'birthday' => $request->birthday,
                'city' => $request->city,
                'hospital_act' => $hospital_act,
                'parents_id' => $request->parents_id,
            ]);

            return Redirect::route('childs.index')->with('success','Enfant créé à jour avec succès');
        }

        return Redirect::back();
    }

    public function edit(Child $child)
    {
        $parents = Parents::all();
        return Inertia::render("Child/Edit", compact("child", "parents"));
    }

    public function update(Request $request, Child $child)
    {
        $hospital_act = $child->hospital_act;
        $request->validate([
            'firstname' => ['required','min:3'],
            'middlename' => ['required','min:3'],
            'lastname' => ['required', 'min:3'],
            'birthday' => ['required', 'min:3'],
            'city' => ['required'],
            'hospital_act' => ['required', 'image|file'],
            'parents_id' => ['required'],
        ]);

        if($request->hasFile('hospital_act')){
            Storage::delete($child->hospital_act);
            $hospital_act = $request->file('hospital_act')->store('childs');
        }

        $child->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'birthday' => $request->birthday,
            'city' => $request->city,
            'hospital_act' => $hospital_act,
            'parents_id' => $request->parents_id,
        ]);
        return Redirect::route('childs.index')->with('success','Enfant mis à jour avec succès');
    }

    
    public function destroy(Child $child)
    {
        Storage::delete($child->hospital_act);
        $child->delete();

        return Redirect::route('child.index')->with('success','Enfant supprimé avec succès');

    }
}
 