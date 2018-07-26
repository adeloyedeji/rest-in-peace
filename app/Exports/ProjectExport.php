<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectExport implements FromCollection, WithStrictNullComparison, WithMapping, WithHeadings
{
    public function collection()
    {
        return \App\Project::all();
    }

    public function map($project): array
    {
        return [
            $project->id,
            $project->title,
            $project->code,
            $project->address,
            $project->owner->fname . ' ' . $project->owner->lname,
            $project->created_at
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Project Title',
            'Project Code',
            'Project Location',
            'Created By',
            'Date created'
        ];
    }
}