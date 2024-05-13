<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Record;
use App\Models\Child;
use Illuminate\Http\Request;
use App\Http\Resources\RecordResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class RecordController extends Controller
{

    public function index()
    {
        $records = RecordResource::collection(Record::with('child')->get());
        return Inertia::render("Records/Index", compact("records"));
    }

    public function create() 
    {
        return Inertia::render("Records/Create", [
            'childs' => Record::when(request('term'), function ($query, $term){
                $query->where('firstname', 'like', "%$term%");
            })->limit(10)->get()
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
        $year_now = Carbon::now()->year;
        $order_number = Record::count() === 0 ? 1 : Record::get()->last()->id + 1;
        $ref_number = "CS-". $year_now ."-" .$order_number; 
        $request->validate([
            'is_delivery' => ['required', 'boolean'],
            'child_id' => ['required']
        ]);

        Record::create([
            'is_delivery' => $request->is_delivery,
            'ref' => $ref_number,
            'child_id' => $request->child_id,
        ]);

        return Redirect::route('records.index')->with('success','L\'enregistrement a été un succès');
   }

    public function edit(Record $record)
    {
        $childs = Child::all();
        return Inertia::render("Records/Edit", compact("record", "childs"));
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
        return Redirect::route('records.index')->with('success','L\'enregistrement de l\'enfant a été mise à jour avec succès');
    }

    
    public function destroy(Record $record)
    {
        $record->delete();

        return Redirect::route('record.index')->with('success','L\'enregistrement de l\'enfant a été supprimé avec succès');

    }
}
 