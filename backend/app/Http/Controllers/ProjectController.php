<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $project;

    public function __construct(){
        $this->project = new Project();   
    }

    public function index()
    {
        //Reading the projects -> returns json
        $response['projects'] = $this->project->all();
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //Store the iser data in a database -> return success message
            $this->project->create($request->all());
            return response()->json([
                'status'=> 'Success',
                'message' => 'Employee created successfully!'
            ], 201);
        }
        catch(QueryException $e){
            return response()->json([
                'status' => 'Error',
                'message' => 'Database error: ' . $e->getMessage()
            ], 400);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred: ' . $e->getMessage() // Catches other general exceptions
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $project = $this->project->find($id);
        $project->update(array_merge($project->toArray(), $request->toArray()));
        // return redirect('project');
        return response()->json([
            'message' => 'Project details updated successfully!'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $project = $this->project->find($id);
        $project->delete();
        return response()->json([
            'message' => 'Project deleted permanently!'
        ], 201);
    }
}
