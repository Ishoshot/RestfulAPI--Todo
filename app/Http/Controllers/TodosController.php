<?php

namespace App\Http\Controllers;

use App\Todos;
use App\Http\Requests;
use Illuminate\Http\Request;
// use App\Todos;
use App\Http\Resources\Todo as TodoResource;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Todos
        $todos = Todos::latest()->get();

        //Return all todos
        return new TodoResource($todos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','min:3'],
            'status' => 'required'
        ]);
    
        $todo = Todos::create($request->all());

        if($todo){
            return new TodoResource($todo);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Update Todo
        $todo = Todos::findOrFail($request->id);
        
        $newTodo = $request->all();

        if($todo->update($newTodo)){
            return new TodoResource($newTodo);
        }
        else{
            return response()->json([
                'message' => 'There was a problem while Updating!'
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::findOrFail($id);
        if ($todo->delete()) {
            return response()->json([
                'message' => 'Todo deleted successfully!'
            ]);
        }
    }
}
