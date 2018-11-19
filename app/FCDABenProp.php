<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCDABenProp extends Model
{
    protected $fillable = [
        'f_c_d_a_structure_beneficiary_code', 'project_id', 'current_interest', 'interest_address', 'interest', 'date_of_inspection', 'title'
    ];
}
