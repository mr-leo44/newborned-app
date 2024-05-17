<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Record;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "record_id",
        "date"
    ];

    public function record() : BelongsTo
    {
        return $this->belongsTo(Record::class);
    }
}
