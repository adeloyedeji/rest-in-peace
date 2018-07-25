<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SVBenProp extends Model
{
    protected $fillable = [
        's_v_ben_id',
        'size_of_plot',
        'building_area',
        'roof',
        'ceiling',
        'wall',
        'window',
        'door',
        'fence',
        'state_of_repairs',
        'accomodation',
        'proof_document',
    ];

    public function svben() {
        return $this->belongsTo(SVBen::class);
    }
}
