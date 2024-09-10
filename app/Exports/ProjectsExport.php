<?php

namespace App\Exports;

use App\Models\Project_list;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectsExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data dari database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Project_list::all([
            'id', 
            'status', 
            'project_name', 
            'project_number', 
            'project_manager', 
            'project_location', 
            'client', 
            'project_start', 
            'project_finish', 
            'project_picture', 
            'sector', 
            'service', 
            'project_description'
        ]);
    }

    /**
     * Tentukan heading untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Status',
            'Project Name',
            'Project Number',
            'Project Manager',
            'Project Location',
            'Client',
            'Project Start',
            'Project Finish',
            'Project Picture',
            'Sector',
            'Service',
            'Project Description'
        ];
    }
}
