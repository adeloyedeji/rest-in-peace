<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $with = [
        'occupation', 'state', 'lga', 'projects', 'owner'
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
        return $this->hasOne(Occupation::class, 'id', 'occupations_id');
    }

    public function state() {
        return $this->belongsTo(State::class, 'states_id', 'id');
    }

    public function lga() {
        return $this->belongsTo(Lga::class, 'lgas_id', 'id');
    }

    public function projects() {
        return $this->hasMany(ProjectBeneficiary::class, 'beneficiary_id', 'id');
    }

    public function owner() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
