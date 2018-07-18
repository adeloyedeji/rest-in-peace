<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $with = [
        'occupation', 'state', 'lga'
    ];
    protected $fillable = [
        'fname',
        'lname',
        'oname',
        'gender',
        'dob',
        'phone',
        'email',
        'wives_total',
        'children_total',
        'occupations_id',
        'tribe',
        'household_head',
        'household_head_photo',
        'street',
        'lgas_id',
        'city',
        'states_id',
        'household_size',
        'created_by',
    ];

    public function dependant() {
        return $this->hasMany(BeneficiaryDependent::class);
    }

    public function property() {
        return $this->hasMany(Property::class);
    }

    public function occupation() {
        return $this->hasOne(Occupation::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function lga() {
        return $this->belongsTo(Lga::class);
    }
}
