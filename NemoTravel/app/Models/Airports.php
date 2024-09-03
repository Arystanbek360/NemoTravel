<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    use HasFactory;

    public $timestamps = null;
    protected $primaryKey = 'code';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'code',
        'cityName',
        'airportName',
        'area',
        'country',
        'lat',
        'lng',
        'timezone',
    ];

    protected $casts = [
        'cityName'    => 'array',
        'airportName' => 'array',
        'lat'         => 'float',
        'lng'         => 'float',
    ];

}
