<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $with = [
        'state', 'lga', 'projects', 'owner', 'dependents', 'properties'
    ];
    protected $fillable = [
        'code',
        'name',
        'gender',
        'dob',
        'phone',
        'email',
        'wives_total',
        'children_total',
        'occupation',
        'tribe',
        'household_head',
        'household_head_photo',
        'street',
        // 'lgas_id', integer
        'city',
        'states_id',
        'household_size',
        'created_by',
    ];

    public function getHouseholdHeadPhotoAttribute($photo) {
        return asset(\Storage::url($photo));
    }

    public function dependant() {
        return $this->hasMany(BeneficiaryDependent::class);
    }

    public function property() {
        return $this->hasMany(Property::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'beneficiaries_id');
    }

    public function state() {
        return $this->belongsTo(State::class, 'states_id', 'id');
    }

    public function lga() {
        return $this->belongsTo(Lga::class, 'lgas_id', 'id');
    }

    public function projects() {
        return $this->belongsTo(ProjectBeneficiary::class, $this->id, 'beneficiary_id');
    }

    public function owner() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function dependents() {
        return $this->hasMany(BeneficiaryDependent::class, 'beneficiaries_id', 'id');
    }
}
