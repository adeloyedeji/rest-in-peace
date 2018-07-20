<?php

use Illuminate\Database\Seeder;

class BeneficiaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Beneficiary::class, 5)->create();
    }
}


