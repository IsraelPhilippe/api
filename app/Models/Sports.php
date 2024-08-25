<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'sports';
    protected $fillable = [
        'name',
        'name_for_url',
        'id_365_score'
    ];

}
