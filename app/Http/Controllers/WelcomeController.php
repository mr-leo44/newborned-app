<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Child;
use App\Models\Parents;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function welcome() {
        return Inertia::render("Welcome");
    }

    function submitRequest(Request $request) {
        $request->validate([
            'father_name' => ['required','min:3'],
            'mother_name' => ['required','min:3'],
            'father_id' => ['required', 'image','file'],
            'mother_id' => ['required', 'image','file'],
            'wedding_act' => ['required', 'image','file'],
            'child_name' => ['required','min:5'],
            'child_birthday' => ['required', 'date'],
            'child_birth_city' => ['required'],
            'child_hospital_act' => ['required', 'image', 'file'],
        ]);

        $father_id = "";
        $mother_id = "";
        $wedding_act = "";
        $child_hospital_act = "";
        
        if($request->hasFile('father_id')) {
            $father_id = $request->file('father_id')->store('parents/ids');
        }

        if($request->hasFile('mother_id')) {
            $mother_id = $request->file('mother_id')->store('parents/ids');
        }

        if($request->hasFile('wedding_act')) {
            $wedding_act = $request->file('wedding_act')->store('parents/acts');
        }

        if($request->hasFile('child_hospital_act')) {
            $child_hospital_act = $request->file('child_hospital_act')->store('childs');
        }

        $parents = Parents::create([
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'father_id' => $father_id,
            'mother_id' => $mother_id,
            'wedding_act' => $wedding_act,
        ]);

        $child = Child::create([
            'name' => request('name'),
            'birthday' => request('birthday'),
            'city' => request('city'),
            'hospital_act' => $child_hospital_act,
            'parents_id' => $parents->id,
        ]);

        $order = Record::count() === 0 ? 1 : Record::get()->last()->id + 1;
        $ref = "CS-". Carbon::now()->year ."-{$order}";
        $record = Record::create([
            'is_delivered' => false,
            'ref' => $ref,
            'child_id' => $child->id,
        ]);

        Appointment::create([
            'record_id' => $record->id
        ]);

        return Redirect::route('/')->with('success','Votre demande a été un succès');

    }
}
