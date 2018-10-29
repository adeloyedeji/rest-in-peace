<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $with = [
        'owner', 'pstatus', 'beneficiaries'
    ];
    protected $fillable = [
        'title',
        'code',
        'address',
        'created_by',
        'role_id'
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

    public function beneficiaries() {
        return $this->hasMany(ProjectBeneficiary::class, 'id', 'project_id');
    }

    public function properties() {
        return $this->hasMany(Property::class);
    }
}
