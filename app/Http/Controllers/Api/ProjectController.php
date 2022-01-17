<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Filters\ProjectFilter;
use App\Http\Resources\ProjectResource;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\ProjectFilter $filter
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectFilter $filter)
    {
        $projects = Project::filter($filter)->paginate();

        return ProjectResource::collection($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function qrcode(Project $project)
    {
        $image = QrCode::format('png')->size(100)->generate($project->id);

        return response($image)->header('Content-type','image/png');
    }
}
