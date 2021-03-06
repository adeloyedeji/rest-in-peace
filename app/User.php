<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kodeine\Acl\Traits\HasRole;

class User extends Authenticatable
{
    use Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'oname',
        'email',
        'username',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = [
        'project'
    ];

    public function projects() {
        return $this->hasMany(ProjectUser::class);
    }


    public function project() {
        return $this->hasMany(Project::class, 'id', 'created_by');
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function svben() {
        return $this->hasMany(SVBen::class);
    }
}
