<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Auth;
use Carbon\Carbon;
use App\Libraries\Repositories\TodoStatusRepository as TodoStatus;


class TodoController extends Controller
{
	protected $todos;

	public function __construct(Todo $todo)
	{
		$this->todos = $todo;

	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();


        return response()->json(['todos' => $user->todos()->latest()->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$todoItem = $request->validate([
        	'title' => 'required'
    	]);

		$todo = $this->todos->create([
			'title' => $todoItem['title'],
			'user_id' => Auth::id()
		]);

		return response($todo, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response($todo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
		$data = $request->validate([
        	'title' => 'required',
        	'completed' => 'required|boolean',
    	]);

    	$todo->update([
			'title' => $request->title,
			'completed_at' => ($request->completed ? Carbon::now() : null )
		]);

    	return response($todo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
		$todo->delete();

    	return response('Todo Deleted Succesfully', 200);
    }

	public function getTodoStatus()
	{
		$lastHour = Auth::user()->todos()->get();

		$todoStatus = new TodoStatus($lastHour, Carbon::now()->subMinutes(60));
		return response()->json(['status' => $todoStatus->status(), 'labels' => $todoStatus->labels()]);

	}
}
