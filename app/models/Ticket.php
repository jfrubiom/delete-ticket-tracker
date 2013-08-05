<?php

class Ticket extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'summary' => 'required',
		'description' => 'required',
		'assignee_id' => 'required',
		'creator_id' => 'required',
		'category_id' => 'required',
		'priority' => 'required',
		'due' => 'required'
	);
}