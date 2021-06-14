<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{

     protected $fillable = [
        'hospitalName', 'level', 'county','location','phone','address'
    ];

}
