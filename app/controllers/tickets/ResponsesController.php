<?php

class ResponsesController extends BaseController 
{

	/**
	 * Response Repository
	 *
	 * @var Response
	 */
	protected $response;

	public function __construct(TicketResponse $response)
	{
		$this->response = $response;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$responses = $this->response->all();

		return View::make('responses.index', compact('responses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('responses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, TicketResponse::$rules);

		if ($validation->passes())
		{
			$this->response->create($input);

			return Redirect::route('responses.index');
		}

		return Redirect::route('responses.create')
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
		$response = $this->response->findOrFail($id);

		return View::make('responses.show', compact('response'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$response = $this->response->find($id);

		if (is_null($response))
		{
			return Redirect::route('responses.index');
		}

		return View::make('responses.edit', compact('response'));
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
		$validation = Validator::make($input, TicketResponse::$rules);

		if ($validation->passes())
		{
			$response = $this->response->find($id);
			$response->update($input);

			return Redirect::route('responses.show', $id);
		}

		return Redirect::route('responses.edit', $id)
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
		$this->response->find($id)->delete();

		return Redirect::route('responses.index');
	}

}