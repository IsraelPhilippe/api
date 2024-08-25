<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'countries';
    protected $fillable = [
        'name',
        'total_games',
        'live_games',
        'name_for_url',
        'id_365_score'
    ];
}
