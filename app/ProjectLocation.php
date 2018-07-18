<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
    protected $fillable = [
        'projects_id',
        'lgas_id',
        'city'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
