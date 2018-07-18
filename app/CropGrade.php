<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropGrade extends Model
{
    protected $fillable = [
        'title'
    ];

    public function cropProperty() {
        return $this->hasMany(CropProperty::class);
    }
}
