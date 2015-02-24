<?php namespace TaskManagement\Http\Controllers;

use TaskManagement\Http\Requests;
use TaskManagement\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Validator;
use TaskManagement\Task;
use Auth;
use Illuminate\Http\Response;
use TaskManagement\Http\Requests\StoreTaskRequest;

class TaskController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getAllUsersNamesByUsersIds($tasks)
	{
		$users_names;
		foreach($tasks as $task){
			$users_names[$task->user_id] = Task::getUserNameByUserId($task->user_id);
		}
		return $users_names;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($order='id')
	{		
		$tasks = Task::orderBy($order)->paginate(15);
		return view('home')->with('tasks', $tasks)
							->with('users', $this->getAllUsersNamesByUsersIds($tasks));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreTaskRequest $request)
	{		
        Task::create(['content' => $request->input('content'), 'user_id' => Auth::user()->id]);
        return redirect('home')->with('status', true);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Task::destroy($id);
		return redirect()
		        ->back()
		        ->withInput();
	}

}
