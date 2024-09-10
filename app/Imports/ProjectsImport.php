<?php  
namespace App\Imports;

use App\Models\Project_list;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProjectsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Mencari proyek berdasarkan ID, jika ada
        $project = Project_list::find($row['id']);

        if ($project) {
            // Jika proyek ditemukan, perbarui semua kolomnya
            $project->update([
                'status'             => $row['status'],
                'project_name'       => $row['project_name'],
                'project_number'     => $row['project_number'],
                'project_manager'    => $row['project_manager'],
                'project_location'   => $row['project_location'],
                'client'             => $row['client'],
                'project_start'      => $row['project_start'],
                'project_finish'     => $row['project_finish'],
                'project_picture'    => $row['project_picture'],
                'sector'             => $row['sector'],
                'service'            => $row['service'],
                'project_description'=> $row['project_description'],
            ]);
        } else {
            // Jika proyek tidak ditemukan, tambahkan data baru
            return new Project_list([
                'status'             => $row['status'],
                'project_name'       => $row['project_name'],
                'project_number'     => $row['project_number'],
                'project_manager'    => $row['project_manager'],
                'project_location'   => $row['project_location'],
                'client'             => $row['client'],
                'project_start'      => $row['project_start'],
                'project_finish'     => $row['project_finish'],
                'project_picture'    => $row['project_picture'],
                'sector'             => $row['sector'],
                'service'            => $row['service'],
                'project_description'=> $row['project_description'],
            ]);
        }
    }
}
