<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    public $timestamps = false;

    protected $table = 'competitions';

    protected $fillable = [
            'countryId',
            'sportId',
            'name',
            'id_365_score'
        ];

    use HasFactory;
}
