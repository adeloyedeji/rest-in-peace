<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropPropertyData extends Model
{
    protected $fillable = [
        'beneficiary_id', 'property_id', 'crop_grades_id', 'length', 'breadth', 'number_of_items', 'size_of_farm', 'grade', 'valuation'
    ];

    protected $with = [
        'property', 'crop'
    ];

    public function grade() {
        return $this->hasOne(CropGrade::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }

    public function crop() {
        return $this->belongsTo(CropGrade::class, 'crop_grades_id');
    }
}
