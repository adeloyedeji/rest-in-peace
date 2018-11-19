<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeneficiaryExport implements FromCollection, WithStrictNullComparison, WithMapping, WithHeadings
{
    public function collection()
    {
        return \App\Beneficiary::all();
    }

    public function map($beneficiary): array
    {
        return [
            $beneficiary->id,
            $beneficiary->fname,
            $beneficiary->lname,
            $beneficiary->oname,
            $beneficiary->gender,
            $beneficiary->dob,
            $beneficiary->phone,
            $beneficiary->email,
            $beneficiary->wives_total,
            $beneficiary->children_total,
            $beneficiary->occupation,
            $beneficiary->tribe,
            $beneficiary->household_head,
            $beneficiary->street,
            $beneficiary->lga->lga,
            $beneficiary->city,
            $beneficiary->state->state,
            $beneficiary->household_size,
            $beneficiary->owner->fname . " " . $beneficiary->owner->fname,
            $beneficiary->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'First name',
            'Last name',
            'Other names',
            'Gender',
            'Date of birth',
            'Phone',
            'Email',
            'Wives',
            'Children',
            'Occupation',
            'Tribe',
            'Household head',
            'Street',
            'Local government area',
            'City',
            'State',
            'Household size',
            'Created by',
            'Date created'
        ];
    }
}