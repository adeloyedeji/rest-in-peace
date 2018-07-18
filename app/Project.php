<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $with = [
        'lga'
    ];
    protected $fillable = [
        'title',
        'code',
        'lgas_id',
        'city',
        'created_by',
    ];

    public function lga() {
        return $this->hasOne(Lga::class);
    }

    public function location() {
        return $this->hasOne(ProjectLocation::class);
    }
}
