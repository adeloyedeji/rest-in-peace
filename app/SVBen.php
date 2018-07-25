<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SVBen extends Model
{
    protected $fillable = [
        'name', 'address', 'user_id'
    ];

    protected $with = [
        'user', 'props', 'bio',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function props() {
        return $this->hasMany(SVBenProp::class);
    }

    public function bio() {
        return $this->hasMany(SVBenBio::class);
    }
}
