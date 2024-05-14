<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Record;
use App\Models\Child;
use Illuminate\Http\Request;
use App\Http\Resources\ChildResource;
use App\Http\Resources\RecordResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class RecordController extends Controller
{

    public function index()
    {
        $records = RecordResource::collection(Record::with('child')->latest()->get());
        return Inertia::render("Records/Index", compact("records"));
    }

    public function create()
    {
        return Inertia::render("Records/Create", [
            'childs' => ChildResource::collection(Child::latest()->get())
        ]);
    }

    public function store(Request $request)
    {
        $selectedChild = $request->selectedChild['id'];
        $order = Record::count() === 0 ? 1 : Record::get()->last()->id + 1;
        $ref = "CS-". Carbon::now()->year ."-{$order}";
        Record::create([
            'is_delivered' => $request->is_delivered,
            'ref' => $ref,
            'child_id' => $selectedChild,
        ]);

        return Redirect::route('records.index')->with('success','L\'enregistrement a été un succès');
   }

    public function edit(Record $record)
    {
        return Inertia::render("Records/Edit", compact("record"));
    }

    public function update(Request $request, Record $record)
    {
        $status = $request->selected['index'];

        $record->update([
            'is_delivered' => $status,
        ]);
        return Redirect::route('records.index')->with('success','Le statut de l\'enregistrement de l\'enfant a été mise à jour avec succès');
    }


    // public function destroy(Record $record)
    // {
    //     $record->delete();

    //     return Redirect::route('record.index')->with('success','L\'enregistrement de l\'enfant a été supprimé avec succès');

    // }
}
