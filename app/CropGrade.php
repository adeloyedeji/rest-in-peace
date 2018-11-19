<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropGrade extends Model
{
    protected $fillable = [
        'crop', 'grade', 'price', 'space_requirement_1', 'space_requirement_2'
    ];

    public function cropProperty() {
        return $this->hasMany(CropProperty::class);
    }
}
