<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropPropertyData extends Model
{
    protected $fillable = [
        'name',
        'value',
        'crop_grades_id',
    ];

    public function grade() {
        return $this->hasOne(CropGrade::class);
    }
}
