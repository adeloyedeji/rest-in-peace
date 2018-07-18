<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $fillable = [
        'title'
    ];

    public function beneficiary() {
        return $this->hasMany(Beneficiary::class);
    }
}
