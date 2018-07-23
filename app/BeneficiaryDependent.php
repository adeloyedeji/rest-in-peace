<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryDependent extends Model
{
    protected $fillable = [
        'beneficiaries_id',
        'name',
        'gender',
        'age',
    ];

    public function beneficiary() {
        return $this->belongsTo(Beneficiary::class, 'id', 'beneficiaries_id');
    }
}
