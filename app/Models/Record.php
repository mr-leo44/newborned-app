<?php

namespace App\Models;

use App\Models\Child;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_delivered',
        'babies_id',
    ];

    public function childs(): HasMany
    {
        return $this->hasMany(Child::class);
    }
}
