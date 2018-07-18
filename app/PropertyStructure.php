<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyStructure extends Model
{
    protected $fillable = [
        'properties_id',
        'type',
        'address',
        'size',
        'area',
        'description',
        'date_of_inspection',
        'roof',
        'ceiling',
        'wall',
        'window',
        'door',
        'fence',
        'state_of_repairs',
        'accomodation',
        'proof',
        'valuation_of_structure',
        'total_valuation',
    ];

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
