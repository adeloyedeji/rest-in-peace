<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $with = [
        'owner', 'pstatus'
    ];
    protected $fillable = [
        'title',
        'code',
        'address',
        'created_by',
    ];

    public function location() {
        return $this->hasOne(ProjectLocation::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function pstatus() {
        return $this->hasOne(ProjectStatus::class, 'project_id', 'id');
    }
}
