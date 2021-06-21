<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRecords extends Model
{
	protected $fillable = [
        'patientName', 'patientId', 'patientPhone','created_at','updated-at'
    ];

}
