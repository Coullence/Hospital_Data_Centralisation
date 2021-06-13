<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{    
	protected $fillable = [
        'patient-Id', 'hospital', 'Category','disease','created_at','updated-at'
    ];

}
