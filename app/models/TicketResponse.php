<?php

class TicketResponse extends Eloquent 
{
    protected $table = 'responses';
	protected $guarded = array();

	public static $rules = array(
        'ticket_id' => 'integer|min:0|required',
        'responder_id' => 'integer|min:0|required',
        'description' => 'required',
	);
}