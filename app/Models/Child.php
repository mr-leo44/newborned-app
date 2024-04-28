<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'birthday',
        'city',
        'hospital_act',
        'parents_id',
    ];

    public function parents(): BelongsTo
    {
        return $this->belongsTo(Parents::class);
    }

    public function record(): BelongsTo
    {
        return $this->belongsTo(Parents::class);
    }
}
