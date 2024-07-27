<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;
use App\Models\User;
use PhpParser\Node\Stmt\Echo_;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', ['posts' => Project::orderBy('created_at')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.posts.create', compact('types', 'techs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated();
        // creo uno slug dal titolo e lo assegno al data
        $data['slug'] = Str::of($data['title'])->slug();
        //

        $project = new Project();
        $project->fill($data);
        $project->save();
        // utilizzo dopo che il project è stato salvato in modo da avere l'id
        if ($request->has('techs')) {
            $project->technologies()->attach($request->techs);
        };

        return redirect()->route('admin.projects.index')->with('message', 'Project successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.posts.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.posts.edit', compact('project', 'types', 'techs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        // creo uno slug dal titolo modificato e lo assegno al data
        $data['slug'] = Str::of($data['title'])->slug();
        $project->update($data);
        // aggiorno i tag che ho modificato
        $project->technologies()->sync($request->techs);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        /**
         * per eliminare i techs dalla tabella pivo abbiamo settato il cascade on delete nelle migrations
         * ma se non fosse così abbiamo 2 modi per eliminare le associazioni che sono:
         * 1) $projects->technologies()->detach();
         * 2) $projects->technologies()->sync([]); sync di un array vuoto
         */

        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Project successfully deleted');
    }
}
