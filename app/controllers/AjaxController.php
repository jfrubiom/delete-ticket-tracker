<?php

class AjaxController extends AuthorizedController 
{
    public function getCategories()
    {
        $category = new Category;
        return $category->search(Request::all())
            ->get(array('id','name as label'));
    }

    public function getUsers()
    {
        $user = new User;
        // return $user->search(Request::all())
        //     ->get(array('id', 'nameAndAddress as label'));

        $found = $user->search(Request::all())
            ->get(array('id', 'first_name', 'email'));

        $results = array();
        foreach($found as $item) {
            $results[] = array($item->id, $item->nameAndAddress);
        }
        return json_encode($results);
    }
}

