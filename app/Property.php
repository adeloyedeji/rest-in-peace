<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'beneficiaries_id',
        'type',
        'ownership',
        'approved',
        'plan',
        'has_trees',
        'others1',
        'others2',
        'others3',
    ];

    public function beneficiary() {
        return $this->belongsTo(Beneficiary::Class);
    }

    public function structure() {
        return $this->hasMany(PropertyStructure::class);
    }

    public function crop() {
        return $this->hasMany(PropertyCrop::class);
    }
}
