<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordResource;
use App\Models\Record;
use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('record')->latest()->get();
        return Inertia::render('Appointments/Index', compact('appointments'));
    }

        public function create()
    {
        $records = RecordResource::collection(Record::latest()->get());
        return Inertia::render('Appointments/Create', compact('records'));
    }

    public function store(Request $request)
    {
        $today = now()->format('Y-m-d');
        $selectedRecord = $request->selectedRecord['id'];
        Appointment::create([
            'record_id' => $selectedRecord,
            'date' => $request->date,
        ]);

        return Redirect::route('appointments.index')->with('success','Le Rendez-vous a été crée avec succès');
   }

    public function edit(Appointment $appointment)
    {
        $record = Record::find($appointment->id);
        return Inertia::render("Appointments/Edit", compact("appointment", "record"));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'date' => $request->date,
        ]);
        return Redirect::route('appointments.index')->with('success','La date du Rendez-vous a été mise à jour avec succès');
    }

}
