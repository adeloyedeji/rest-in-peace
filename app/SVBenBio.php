<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SVBenBio extends Model
{
    protected $fillable = [
        's_v_ben_id', 'passport', 'rthumb', 'lthumb',
    ];

    public function svben() {
        return $this->belongsTo(SVBen::class);
    }
}
