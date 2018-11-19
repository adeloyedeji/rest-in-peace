<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCDAPlanningBen extends Model
{
    protected $fillable = [
        'f_c_d_a_beneficiary_id', 'code', 'village', 'address', 'city', 
        'household_head', 'sub_household_head', 'date_of_birth', 'gender', 
        'wives', 'children', 'occupation', 'state_of_origin', 'tribe', 'indigene', 
        'duration', 'household_size', 'property_type', 'accomodation_type', 'ownership_type', 'plan_approval', 
        'project_id'
    ];

    public function getPhotoAttribute($photo)
    {
        return asset(\Storage::url($photo));
    }

    public function origin($id)
    {
        return State::find($id);
    }
}
