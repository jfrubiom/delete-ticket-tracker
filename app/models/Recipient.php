<?php

class Recipient extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'ticket_id' => 'required',
		'recipient_id' => 'required',
		'recipient_type' => 'required'
	);
}