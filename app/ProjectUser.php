<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable = [
        'users_id', 'projects_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
