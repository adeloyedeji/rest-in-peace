<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectStatusExport implements FromCollection, WithStrictNullComparison, WithMapping, WithHeadings
{
    public function collection()
    {
        return \App\ProjectStatus::all();
    }

    public function setProjectStatus($status) {
        if($status == 1) {
            return "Active";
        } else {
            return "Completed";
        }
    }

    public function map($project): array
    {
        return [
            $project->id,
            $project->project->title,
            $project->project->code,
            $this->setProjectStatus($project->status),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Project Title',
            'Project Code',
            'Status',
        ];
    }
}