<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCDAStructureBeneficiaryPropertySub extends Model
{
    protected $fillable = [
        'f_c_d_a_structure_beneficiary_property_id', 'roof', 'ceiling', 'wall', 'window', 'door', 'floor'
    ];

    public function property()
    {
        return $this->belongsTo(FCDAStructureBeneficiaryProperty::class);
    }
}
