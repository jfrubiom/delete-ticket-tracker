<?php

class DepartmentsController extends BaseController 
{

	/**
	 * Department Repository
	 *
	 * @var Department
	 */
	protected $department;

	public function __construct(Department $department)
	{
		$this->department = $department;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$departments = $this->department->all();

		return View::make('departments.index', compact('departments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('departments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Department::$rules);

		if ($validation->passes())
		{
			$this->department->create($input);

			return Redirect::route('departments.index');
		}

		return Redirect::route('departments.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$department = $this->department->findOrFail($id);

		return View::make('departments.show', compact('department'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$department = $this->department->find($id);

		if (is_null($department))
		{
			return Redirect::route('departments.index');
		}

		return View::make('departments.edit', compact('department'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Department::$rules);

		if ($validation->passes())
		{
			$department = $this->department->find($id);
			$department->update($input);

			return Redirect::route('departments.show', $id);
		}

		return Redirect::route('departments.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->department->find($id)->delete();

		return Redirect::route('departments.index');
	}

}