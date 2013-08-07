<?php

// use LaravelBook\Ardent\Ardent;

// class Ticket extends LaravelBook\Ardent\Ardent
class Ticket extends Eloquent
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

	public function scopeMine($query)
	{
		$user = Sentry::getUser();

		$query->where('assignee_id', $user->id);
	}

	public function createdByMe($query)
	{
		$user = Sentry::getUser();
		$query->where('creator_id', $user->id);
	}

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