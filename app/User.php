<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        'role',
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
}
