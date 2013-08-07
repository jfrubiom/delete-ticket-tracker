<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel 
{

	/**
	 * Indicates if the model should soft delete.
	 *
	 * @var bool
	 */
	protected $softDelete = true;

	/**
	 * Returns the user full name, it simply concatenates
	 * the user first and last name.
	 *
	 * @return string
	 */
	public function fullName()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	public function getNameAttribute()
	{
		return $this->fullName();
	}

	public function getNameAndAddressAttribute()
	{
		return "{$this->first_name}  <{$this->email}>";
	}

	/**
	 * Returns the user Gravatar image url.
	 *
	 * @return string
	 */
	public function gravatar()
	{
		// Generate the Gravatar hash
		$gravatar = md5(strtolower(trim($this->gravatar)));

		// Return the Gravatar url
		return "//gravatar.org/avatar/{$gravatar}";
	}


    public function search($searchTerms = array())
    {
        if (empty($searchTerms)) {
            return $this->take($this->perPage);
        }

        $search = $this->where('first_name', 'like', $searchTerms['term'].'%')
        	->orWhere('last_name', 'like', $searchTerms['term'].'%')
        	->orWhere('email', 'like', $searchTerms['term'].'%');

        return $search->take($this->perPage);
    }

	public function tickets()
	{
		$this->hasMany('Ticket');
	}
}
