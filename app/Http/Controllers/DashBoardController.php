<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Child;
use App\Models\Record;
use App\Models\Parents;
use App\Http\Resources\RecordResource;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        $undelivered_records = Record::where('is_delivered' ,'=','0')->count();
        $record_today = RecordResource::collection(Record::with('child')->whereDate('created_at', Carbon::today())->latest()->limit(5)->get());
        $parents_count = Parents::count();
        $childs_count = Child::count();
        return Inertia::render("Dashboard", compact('record_today','undelivered_records', 'parents_count', 'childs_count'));
    }
}
