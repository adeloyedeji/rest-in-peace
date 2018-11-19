<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class FCDABeneficiary extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'gender', 'photo', 'type'
    ];
    // types:
    // 1 - Structure Beneficiary
    // 2 - Planning Beneficiary
    // 3 - Monitoring & Control
    // 4 - Crops & Economic Trees

    public function getPhotoAttribute($photo)
    {
        return asset(\Storage::url($photo));
    }

    public function structuresProfile()
    {
        return $this->hasMany(FCDAStructureBeneficiary::class);
    }

    public function projects() 
    {
        return $this->belongsTo(ProjectBeneficiary::class, 'id', 'beneficiary_id');
    }

    public function planning_profile($id)
    {
        return FCDAPlanningBen::where('f_c_d_a_beneficiary_id', $id)->first();
    }

    public function monitoring_and_control($id)
    {
        return FCDAMCBen::where('f_c_d_a_beneficiary_id', $id)->first();
    }
}
