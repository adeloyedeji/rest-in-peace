<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryBio extends Model
{
    protected $fillable = [
        'beneficiaries_id', 'finger1', 'finger2', 'finger3', 'finger4'
    ];
}
