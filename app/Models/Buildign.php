<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Buildign extends Model
{
    use HasFactory;
    protected $fillable = [
        'circuit_id',
        'name',
        'description',
        'audio',
        'latitude',
        'longitude',
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}
