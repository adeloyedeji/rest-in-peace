<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBeneficiary extends Model
{
    protected $with = [
        'project'
    ];
    protected $fillable = [
        'project_id', 'beneficiary_id'
    ];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
