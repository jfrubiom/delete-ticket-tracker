<?php

class RecipientsController extends BaseController {

	/**
	 * Recipient Repository
	 *
	 * @var Recipient
	 */
	protected $recipient;

	public function __construct(Recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$recipients = $this->recipient->all();

		return View::make('recipients.index', compact('recipients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('recipients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Recipient::$rules);

		if ($validation->passes())
		{
			$this->recipient->create($input);

			return Redirect::route('recipients.index');
		}

		return Redirect::route('recipients.create')
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
		$recipient = $this->recipient->findOrFail($id);

		return View::make('recipients.show', compact('recipient'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$recipient = $this->recipient->find($id);

		if (is_null($recipient))
		{
			return Redirect::route('recipients.index');
		}

		return View::make('recipients.edit', compact('recipient'));
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
		$validation = Validator::make($input, Recipient::$rules);

		if ($validation->passes())
		{
			$recipient = $this->recipient->find($id);
			$recipient->update($input);

			return Redirect::route('recipients.show', $id);
		}

		return Redirect::route('recipients.edit', $id)
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
		$this->recipient->find($id)->delete();

		return Redirect::route('recipients.index');
	}

}