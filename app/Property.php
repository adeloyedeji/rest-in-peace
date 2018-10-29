<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'beneficiaries_id',
        'property_code',
        'project_id',
        'type',
        'ownership',
        'approved',
        'plan',
        'has_trees',
        'others1',
        'others2',
        'others3',
    ];

    protected $with = [
        'project'
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

    public function cropProperty() {
        return $this->hasMany(CropPropertyData::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
