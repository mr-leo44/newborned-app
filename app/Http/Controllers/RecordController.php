<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Record;
use App\Models\Child;
use Illuminate\Http\Request;
use App\Http\Resources\RecordResource;
use Illuminate\Support\Facades\Redirect;

class RecordController extends Controller
{

    public function index()
    {
        $records = RecordResource::collection(Record::with('childs')->get());
        return Inertia::render("Record/Index", compact("records"));
    }

    public function create() 
    {
        $childs = Child::all();
        return Inertia::render("Record/Create", compact('childs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_delivery' => ['required', 'boolean'],
            'child_id' => ['required']
        ]);

        Record::create([
            'is_delivery' => $request->is_delivery,
            'chil_id' => $request->chil_id,
        ]);

        return Redirect::route('records.index')->with('success','La demande de l\'acte a été un succès');
   }

    public function edit(Record $record)
    {
        $childs = Child::all();
        return Inertia::render("Record/Edit", compact("record", "childs"));
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'is_delivery' => ['required', 'boolean'],
            'child_id' => ['required']
        ]);

        $record->update([
            'is_delivery' => $request->is_delivery,
            'child_id' => $request->child_id,
        ]);
        return Redirect::route('records.index')->with('success','La demande de l\'acte a été mise à jour avec succès');
    }

    
    public function destroy(Record $record)
    {
        $record->delete();

        return Redirect::route('record.index')->with('success','La demande l\acte a été supprimé avec succès');

    }
}
 