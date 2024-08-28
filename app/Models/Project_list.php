<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_list extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari default
    protected $table = 'project_list'; 

    // Tentukan kolom mana yang bisa diisi secara massal
    protected $fillable = [
        'status',
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
    ];

    // Set up attributes casting if needed
    protected $casts = [
        'project_start' => 'date',
        'project_finish' => 'date',
    ];
}
