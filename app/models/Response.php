<?php

class Response extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'ticket_id' => 'required',
		'responder_id' => 'required',
		'description' => 'required'
	);
}