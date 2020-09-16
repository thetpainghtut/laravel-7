<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        
        return response()->json([
            'status' => 'ok',
            'totalResults' => count($projects),
            'projects' => ProjectResource::collection($projects)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
        $request->validate([
            'title' => 'required|min:5',
            'photo' => 'required|mimes:jpeg,bmp,png',
            'url' => 'required',
            'viewer' => 'required',
            'ptype' => 'required|exists:App\Ptype,id'
        ]);

        // if include file, upload
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('project_photo', $fileName, 'public');
            $file_path = '/storage/'.$filePath;
        }

        // save 
        $project = new Project;
        $project->title = $request->title;
        $project->photo = $file_path;
        $project->url = $request->url;
        $project->viewer = $request->viewer;
        $project->ptype_id = $request->ptype;
        $project->save();

        // response
        return (new ProjectResource($project))
                    ->response()
                    ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
