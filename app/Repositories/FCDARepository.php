<?php

namespace App\Repositories;

use App\Interfaces\FCDAInterface;

class FCDARepository implements FCDAInterface
{
    public function get_beneficiaries()
    {
        $beneficiaries = \App\FCDABeneficiary::paginate(20);

        return $beneficiaries;
    }
}