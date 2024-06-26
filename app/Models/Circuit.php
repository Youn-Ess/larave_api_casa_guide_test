<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Circuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alternative',
        'description',
        'audio',
        'headpoint',
        'zoom',
    ];

    public function paths()
    {
        return $this->hasMany(Path::class);
    }

    public function buildings()
    {
        return $this->hasMany(Buildign::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}
