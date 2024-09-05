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
        'cityName_ru',
        'cityName_en',
        'airportName_ru',
        'airportName_en',
        'area',
        'country',
        'lat',
        'lng',
        'timezone',
    ];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];

}
