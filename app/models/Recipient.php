<?php

class Recipient extends Eloquent 
{
	protected $guarded = array();

	public static $rules = array(
        'ticket_id' => 'integer|min:0|required',
        'recipient_id' => 'integer|min:0|required',
        'recipient_type' => 'max:1|required',
	);
}