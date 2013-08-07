<?php

class Category extends Eloquent 
{
	protected $guarded = array();

	public static $rules = array(
        'name' => 'max:20|required',
	);

    public function search($searchTerms = array())
    {
        if (empty($searchTerms)) {
            return $this->take($this->perPage);
        }

        $search = $this->where('name', 'like', $searchTerms['term'].'%');

        return $search->take($this->perPage);
    }

}