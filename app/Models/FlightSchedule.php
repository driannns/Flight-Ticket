<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'airline',
        'departure',
        'departure_code',
        'arrival',
        'arrival_code',
        'class',
        'price',
        'duration',
        'scheduled' ,
        'estimated' ,
        'date',
    ];
}
