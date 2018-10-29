<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function user() {
        // return $this->hasMany(RoleUser::class);
        return $this->hasMany(User::class);
    }
}
