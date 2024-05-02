<?php

namespace App\Models;

use App\Models\Child;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'is_delivered',
    ];

    public function childs(): BelongsTo
    {
        return $this->belongsTo(Child::class);
    }
}
