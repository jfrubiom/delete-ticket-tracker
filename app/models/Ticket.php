<?php

use Carbon\Carbon;
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
		'closed_at' => 'datetime',
		'due' => 'date',
	);


// Scopes -----------------------------------------------------------------------

	/**
	 * Tickets assigned to the current user
	 */
	public function scopeAssignedToMe($query)
	{
		$user = Sentry::getUser();
		if( ! $user) {
			return;
		}

		$query->where('assignee_id', $user->id);
	}

	/**
	 * Tickets created by the current user
	 */
	public function scopeCreatedByMe($query)
	{
		$user = Sentry::getUser();
		if( ! $user) {
			return;
		}

		$query->where('creator_id', $user->id);
	}

	public function scopeMine($query)
	{
		$user = Sentry::getUser();
		if ( ! $user ) {
			return;
		}

		$query->where('creator_id', $user->id)
			->orWhere('assignee_id', $user->id);
	}

	/**
	 * Tickets that have not been assigned to anyone yet
	 */
	public function scopeUnassigned($query)
	{
		$query->where('assignee_id', 0);
	}

	/**
	 * All tickets that are still open
	 */
	public function scopeOpen($query)
	{
		$query->whereRaw('closed_at=0');
	}

	/**
	 * All tickets that have been closed
	 */
	public function scopeClosed($query)
	{
		$query->whereRaw('closed_at<>0');
	}

	/**
	 * Tickets that are past due (the due date has been passed)
	 */
	public function scopePastDue($query)
	{
		$query->whereRaw('closed_at=0 and due>0 and due<"' 
			. Carbon::now()->toDateTimeString() . '"');
	}

	/**
	 * Tickets that have been updated in the past week
	 */
	public function scopeRecentlyUpdated($query)
	{
		$query->whereRaw('updated_at>"' . Carbon::now()->subWeek()->toDateTimeString() . '"');
	}

	/**
	 * Tickets that were created for a given department
	 */
	public function scopeForDepartment($query, $departmentId)
	{
		$query->where('department_id', $departmentId);
	}

	/**
	 * Tickets with a particular category code
	 */
	public function scopeForCategory($query, $categoryId)
	{
		$query->where('category_id', $categoryId);
	}

	public function scopeForAll($query)
	{
		$query->whereRaw('1=1');
	}

	// public static function getStatistics()
	// {
	// 	return 'foo';
	// }

// Relationships --------------------------------------------------------

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