<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Project_list;

class ProjectController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $projects = Project_list::all();
    return view('project.index', [
        'projects' => $projects
    ]);
    }

    public function index2()
    {
        $projects = Project_list::all();
        return view('tampilan', [
            'projects' => $projects
        ]);
    }

    // Menampilkan form pembuatan proyek
    public function create()
{
    return view('project.create');
}

// Menyimpan data project ke database

public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'category' => 'required|string|max:255',
        'project_number' => 'required|string|max:255',
        'project_manager' => 'required|string|max:255',
        'project_location' => 'required|string|max:255',
        'client' => 'required|string|max:255',
        'project_start' => 'required|date',
        'project_finish' => 'required|date',
        'project_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'sector' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'project_description' => 'required|string',
    ]);

    // Menyimpan data ke database
    $project = new Project_list();
    $project->category = $request->category;
    $project->project_number = $request->project_number;
    $project->project_manager = $request->project_manager;
    $project->project_location = $request->project_location;
    $project->client = $request->client;
    $project->project_start = $request->project_start;
    $project->project_finish = $request->project_finish;
    $project->sector = $request->sector;
    $project->service = $request->service;
    $project->project_description = $request->project_description;

    // Mengupload gambar jika ada
    if ($request->hasFile('project_picture')) {
        $project->project_picture = $request->file('project_picture')->store('project_pictures', 'public');
    }

    $project->save();

    return redirect()->route('project.index')->with('success', 'Project created successfully');
}



    // Menampilkan form edit proyek
    public function edit(Project_list $project)
    {
        return view('project.edit', compact('project'));
    }

    // Memperbarui proyek
    public function update(Request $request, Project_list $project)
    {
        // Validasi dan pembaruan proyek
    }

    // Menghapus proyek
    public function destroy(Project_list $project)
    {
        // Penghapusan proyek
    }
}


?>