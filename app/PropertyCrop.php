<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyCrop extends Model
{
    protected $fillable = [
        'properties_id',
        'name',
        'total',
        'size',
        'crop_grades_id',
        'owner_present',
        'valuation',
        'date_of_enumeration',
        'remark',
    ];

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
