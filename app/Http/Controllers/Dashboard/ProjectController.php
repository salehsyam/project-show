<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectRequest;
use App\Http\Filters\ProjectFilter;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * ProjectController Constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\ProjectFilter $filter
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectFilter $filter)
    {
        $projects = Project::filter($filter)->paginate();

        return view('dashboard.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create(array_merge($request->all(), [
            'user_id' => auth()->id(),
        ]));

        $project->addOrUpdateMultipleMediaFromRequest('images');

        flash(trans('projects.messages.created'));

        return redirect()->route('dashboard.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('dashboard.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\ProjectRequest $request
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        $project->addOrUpdateMultipleMediaFromRequest('images');

        flash(trans('projects.messages.updated'));

        return redirect()->route('dashboard.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        flash(trans('projects.messages.deleted'));

        return redirect()->route('dashboard.projects.index');
    }
}
