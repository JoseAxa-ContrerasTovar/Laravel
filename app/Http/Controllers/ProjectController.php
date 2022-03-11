<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        return view('projects.index', [
            'projects' => Project::with('category')->latest()->paginate()
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {

        $project = new Project ($request -> validated());

        $project -> image = $request -> file('image') -> store('images');

        $project -> save();

        return redirect() -> route('projects.index')->with('status', 'Proyecto creado con éxito.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project , SaveProjectRequest $request)
    {
        if($request->hasFile('image')){

            Storage:: delete($project->image);

            $project -> fill( $request -> validated() );

            $project -> image = $request -> file('image') -> store('images');

            $project -> save();
        } else{
            $project -> update( array_filter($request -> validated()) );
        } 

        return redirect() -> route('projects.show', $project)->with('status', 'Proyecto actualizado con éxito.');
    }

    public function destroy(Project $project)
    {
        Storage:: delete($project->image);

        $project-> delete();
        
        return redirect() -> route('projects.index')->with('status', 'Proyecto eliminado con éxito.');
    }
}
