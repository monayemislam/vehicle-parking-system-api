<?php

namespace App\Models\PayMethod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymethod extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
