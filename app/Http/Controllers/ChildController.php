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
        $parents = Parents::all();
        return Inertia::render("Child/Create", compact("parents"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','min:5', 'unique:'.Child::class],
            'birthday' => ['required', 'date'],
            'city' => ['required'],
            'hospital_act' => ['required', 'image', 'file'],
            'parents_id' => ['required'],
        ]);

        $hospital_act = "";
        if($request->hasFile('hospital_act')) {
            $hospital_act = $request->file('hospital_act')->store('childs');
            Child::create([
                'name' => request('name'),
                'birthday' => request('birthday'),
                'city' => request('city'),
                'hospital_act' => $hospital_act,
                'parents_id' => request('parents_id'),
            ]);
        }
        return Redirect::route('childs.index')->with('success','Enfant créé à jour avec succès');
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
            'name' => ['min:5', 'unique:'.Child::class],
            'birthday' => ['date'],
            'city' => ['min:2'],
            'hospital_act' => ['image','file'],
        ]);

        if($request->hasFile('hospital_act')){
            Storage::delete($child->hospital_act);
            $hospital_act = $request->file('hospital_act')->store('childs');
        }
        $child->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'city' => $request->city,
            'hospital_act' => $hospital_act ?? $child->hospital_act,
            'parents_id' => $request->parents_id,
        ]);
        
        return Redirect::route('childs.index')->with('success','Enfant mis à jour avec succès');

    }

    
    public function destroy(Child $child)
    {
        Storage::delete($child->hospital_act);
        $child->delete();

        return Redirect::route('childs.index')->with('success','Enfant supprimé avec succès');

    }
}
 