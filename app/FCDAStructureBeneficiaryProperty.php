<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCDAStructureBeneficiaryProperty extends Model
{
    protected $fillable = [
       'f_c_d_a_ben_prop_id', 'size_of_plots', 'building_plan', 'type_of_development', 'roof', 'ceiling', 'wall', 'window', 'door', 'floor', 
        'fence', 'state_of_repairs', 'accomodation', 'external_works', 'services', 'electricity', 'water', 'valuation_data', 'valuation', 'compensation'
    ];

    public function structureBeneficiary()
    {
        return $this->belongsTo(FCDAStructureBeneficiary::class, 'code');
    }

    public function subProperty()
    {
        return $this->hasMany(FCDAStructureBeneficiaryPropertySub::class);
    }
}
