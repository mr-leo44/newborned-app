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
            'family_name' => ['unique:'.Parents::class],
            'father_name' => ['required','min:3'],
            'mother_name' => ['required','min:3'],
            'parents_phone' => ['required','min:10'],
            'parents_email' => ['required','email'],
            'father_id' => ['required', 'image','file'],
            'mother_id' => ['required', 'image','file'],
            'wedding_act' => ['required', 'image','file'],
            'child_name' => ['required','min:5'],
            'child_birthday' => ['required', 'date'],
            'child_city' => ['required'],
            'child_hospital_act' => ['required', 'image', 'file'],
        ]);

        $parents = Parents::create([
            'family_name' => $request->family_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'parents_email' => $request->parents_email,
            'parents_phone' => $request->parents_phone,
            'wedding_act' => $request->file('wedding_act')->store('parents/acts'),
            'father_id' => $request->file('father_id')->store('parents/ids'),
            'mother_id' => $request->file('mother_id')->store('parents/ids'),
        ]);

        $child = Child::create([
            'name' => request('child_name'),
            'birthday' => request('child_birthday'),
            'city' => request('child_city'),
            'hospital_act' => $request->file('child_hospital_act')->store('childs'),
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

        return Redirect::route('success')->with('success','Votre demande a été un succès. Vous serez contacté endéans une semaine après traitement de dossier');

    }

    public function success() {
        return Inertia::render('Success');
    }
}
