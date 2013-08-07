<?php

class Ticket extends Ardent 
{
	public $autoHydrateEntityFromInput = true;
    public $autoPurgeRedundantAttributes = true;

	protected $guarded = array();

	public static $rules = array(
		'summary' => 'max:255|required',
		'description' => 'required',
		'assignee_id' => 'integer|min:0',
		'creator_id' => 'integer|min:0',
		'department_id' => 'integer|min:0',
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

	public function department()
	{
		return $this->belongsTo('Department', 'department_id');
	}

}