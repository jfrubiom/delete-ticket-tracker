<?php

class Ticket extends Eloquent 
{
	protected $guarded = array();

	public static $rules = array(
		'summary' => 'max:255|required',
		'description' => 'required',
		'assignee_id' => 'integer|min:0',
		'creator_id' => 'integer|min:0',
		'category_id' => 'integer|min:0',
		'priority' => 'max:1',
	);

	public function assignedTo()
	{
		return $this->belongsTo('User', 'assignee_id');
	}

	public function createdBy()
	{
		return $this->belongsTo('User', 'creator_id');
	}

	public function category()
	{
		return $this->belongsTo('Category', 'category_id');
	}

}