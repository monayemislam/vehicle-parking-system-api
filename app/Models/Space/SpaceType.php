<?php

namespace App\Models\Space;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
}
