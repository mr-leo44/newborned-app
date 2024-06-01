<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Child;
use App\Models\Record;
use App\Models\Parents;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    public function welcome() {
        return Inertia::render("Welcome");
    }

    public function request() {
        return Inertia::render("Frontend/FormRequest");
    }
    public function submitRequest(Request $request) {
        $request->validate([
            'father_name' => ['required','min:3'],
            'mother_name' => ['required','min:3'],
            'father_id' => ['required', 'image','file'],
            'mother_id' => ['required', 'image','file'],
            'wedding_act' => ['required', 'image','file'],
            'child_name' => ['required','min:5'],
            'child_birthday' => ['required', 'date'],
            'child_city' => ['required'],
            'child_hospital_act' => ['required', 'image', 'file'],
        ]);

        $father_id = "";
        $mother_id = "";
        $wedding_act = "";
        $child_hospital_act = "";

        // if($request->hasFile('father_id')) {
        //     $father_id = $request->file('father_id')->store('parents/ids');
        // }

        // if($request->hasFile('mother_id')) {
        //     $mother_id = $request->file('mother_id')->store('parents/ids');
        // }

        
        // if($request->hasFile('wedding_act')) {
        //     $wedding_act = $request->file('wedding_act')->store('parents/acts');
        // }

        $parents = Parents::create([
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'wedding_act' => $request->file('wedding_act')->store('parents/acts'),
            'father_id' => $request->file('father_id')->store('parents/ids'),
            'mother_id' => $request->file('mother_id')->store('parents/ids'),
        ]);
        if($request->hasFile('child_hospital_act')) {
            $child_hospital_act = $request->file('child_hospital_act')->store('childs');
        }

        $child = Child::create([
            'name' => request('child_name'),
            'birthday' => request('child_birthday'),
            'city' => request('child_city'),
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

        return Redirect::route('welcome')->with('success','Votre demande a été un succès');

    }
}
