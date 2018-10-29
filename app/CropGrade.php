<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropGrade extends Model
{
    protected $fillable = [
        'crop', 'grade', 'price', 'space_requirement'
    ];

    public function cropProperty() {
        return $this->hasMany(CropProperty::class);
    }
}
