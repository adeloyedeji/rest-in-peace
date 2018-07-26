<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $fillable = [
        'project_id', 'status'
    ];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
