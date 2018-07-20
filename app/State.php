<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function beneficiary() {
        return $this->hasMany(Beneficiary::class, 'states_id', 'id');
    }
}
