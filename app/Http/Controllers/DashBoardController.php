<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Child;
use App\Models\Record;
use App\Models\Parents;
use App\Http\Resources\RecordResource;
use App\Models\Appointment;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        $undelivered_records = Record::where('is_delivered' ,'=','0')->count();
        $record_today = RecordResource::collection(Record::with('child')->whereDate('created_at', Carbon::today())->latest()->limit(5)->get());
        $parents_count = Parents::count();
        $childs_count = Child::count();
        $appointments = Appointment::latest()->limit(5)->get();
        return Inertia::render("Dashboard", compact('appointments','record_today','undelivered_records', 'parents_count', 'childs_count'));
    }
}
