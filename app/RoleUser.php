<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = "role_user";
    protected $fillable = [
        'user_id', 'role_id'
    ];

    protected $with = [
        'role'
    ];

    public function users() {
        return $this->hasMany(User::class, $this->role_id);
    }

    public function role() {
        return $this->hasOne(Role::class);
    }
}
