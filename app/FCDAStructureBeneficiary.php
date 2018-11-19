<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCDAStructureBeneficiary extends Model
{
    protected $fillable = [
        'f_c_d_a_beneficiary_id', 'code', 'village', 'address', 'location',
    ];

    public function structureBeneficiary()
    {
        return $this->belongsTo(FCDABeneficiary::class);
    }

    public function structureProperty()
    {
        return $this->hasMany(FCDAStructureBeneficiaryProperty::class, 'f_c_d_a_structure_beneficiary_code', 'code');
    }
}
