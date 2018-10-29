<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyCrop extends Model
{
    protected $fillable = [
        'properties_id',
        'owner_present',
        'date_of_inspection',
        'remarks',
        'total',
    ];

    protected $with = [
        'property'
    ];

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
