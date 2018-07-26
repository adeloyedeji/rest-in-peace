<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminExport implements FromCollection, WithStrictNullComparison, WithMapping, WithHeadings
{
    public function collection()
    {
        return \App\User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->fname,
            $user->lname,
            $user->oname,
            $user->email,
            $user->username,
            $user->phone,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'First name',
            'Last name',
            'Other names',
            'E-mail',
            'Username',
            'Phone',
            'Date created',
        ];
    }
}