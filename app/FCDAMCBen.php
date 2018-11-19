<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCDAMCBen extends Model
{
    protected $fillable = [
        'code', 'project_id', 'address', 'f_c_d_a_beneficiary_id', 'city', 'phone', 'date_of_birth', 'state_of_origin', 'tribe', 'amount_collected'
    ];

    public function origin($id)
    {
        return State::find($id);
    }
}
