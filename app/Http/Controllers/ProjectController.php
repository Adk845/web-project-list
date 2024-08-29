<?php 

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use App\Models\Project_list;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{

    public function generatePdf($id)
    {
        // Fetch the project by ID
        $projects = Project_list::find($id);
    
        // Check if the project exists
        if (!$projects) {
            return redirect()->route('project.index')->with('error', 'Project not found.');
        }
    
        // Generate the PDF (assuming $projects is an array or collection of projects)
        $pdf = PDF::loadView('project.pdf', ['projects' => [$projects]]);
    
        // Return the generated PDF
        return $pdf->download('project-list.pdf');
    }

    public function generatePdfAll()
    {
        $projects = Project_list::all();
        if ($projects->isEmpty()) {
            return redirect()->route('project.index')->with('error', 'No projects found.');
        }
        $pdf = PDF::loadView('pdf.all_project', ['projects' => $projects]);
        return $pdf->download('all-projects.pdf');
    }


    
    
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
        'status' => 'required|string|max:255',
        'project_number' => 'required|string|max:255',
        'project_manager' => 'required|string|max:255',
        'project_location' => 'required|string|max:255',
        'client' => 'required|string|max:255',
        'project_start' => 'required|date',
        'project_finish' => 'required|date',
        'project_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'sector' => 'required|array',
        'service' => 'required|array',
        'project_description' => 'required|string',
    ]);

    // Menyimpan data ke database
    $project = new Project_list();
    $project->status = $request->status;
    $project->project_number = $request->project_number;
    $project->project_manager = $request->project_manager;
    $project->project_location = $request->project_location;
    $project->client = $request->client;
    $project->project_start = $request->project_start;
    $project->project_finish = $request->project_finish;
    $project->sector =  implode(', ', $request->sector);
    $project->service =implode(', ', $request->service);
    $project->project_description = $request->project_description;

    // Mengupload gambar jika ada
    if ($request->hasFile('project_picture')) {
        $project->project_picture = $request->file('project_picture')->store('project_pictures', 'public');
    }

    $project->save();

    return redirect()->route('project.index')->with('success', 'Project created successfully');
}



    // Menampilkan form edit proyek
    public function edit($id)
    {
        // Temukan proyek berdasarkan ID
        $project = Project_list::findOrFail($id);
    
        // Pass data proyek ke tampilan edit
        return view('project.edit', compact('project'));
    }
    

    // Memperbarui proyek
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'status' => 'required|string|in:On Progres,Finish', // Validate against allowed values
            'project_number' => 'required|string|max:255',
            'project_manager' => 'required|string|max:255',
            'project_location' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_start' => 'required|date',
            'project_finish' => 'required|date',
            'project_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sector' => 'required|array',
            'service' => 'required|array',
            'project_description' => 'required|string',
        ]);
    
        // Temukan proyek berdasarkan ID
        $project = Project_list::findOrFail($id);
    
        // Update data proyek
        $project->status = $request->status;
        $project->project_number = $request->project_number;
        $project->project_manager = $request->project_manager;
        $project->project_location = $request->project_location;
        $project->client = $request->client;
        $project->project_start = $request->project_start;
        $project->project_finish = $request->project_finish;
        $project->sector = implode(', ', $request->sector); // Convert array to comma-separated string
        $project->service = implode(', ', $request->service); // Ensure it's a string
        $project->project_description = $request->project_description;
    
        // Cek jika file gambar diupload
        // if ($request->hasFile('project_picture')) {
        //     // Hapus gambar lama jika ada
        //     if ($project->project_picture) {
        //         \Storage::disk('public')->delete($project->project_picture);
        //     }
    
        //     // Upload gambar baru
        //     $project->project_picture = $request->file('project_picture')->store('project_pictures', 'public');
        // }
    
        $project->save();
    
        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }
    
    // Menghapus proyek
    public function destroy(Project_list $project)
    {
        // Menghapus gambar proyek jika ada
        if ($project->project_picture) {
            Storage::disk('public')->delete($project->project_picture);
        }
    
        // Menghapus data proyek dari database
        $project->delete();
    
        return redirect()->route('project.index')->with('success', 'Project deleted successfully');
    }
    
}


?>