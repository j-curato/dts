<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pars extends Model
{
 	protected $fillable = [
        'log_ref_number', 'date_received',  'type_of_transmittal', 'origin', 'subject','rds_instruction','route_to', 'date_released', 'action','year'
    ];
}
