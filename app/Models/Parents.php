<?php

namespace App\Models;

use App\Models\Child;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_name',
        'mother_name',
        'father_id',
        'mother_id',
        'wedding_act'
    ];

    public function childs(): HasMany
    {
        return $this->hasMany(Child::class);
    }
}
