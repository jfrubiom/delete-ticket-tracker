<?php

class AjaxController extends BaseController 
{
    public function getPriorities()
    {
        $priorities = array(
            array('id' => '1', 'label' => '1 (highest)'),
            array('id' => '2', 'label' => '2'),
            array('id' => '3', 'label' => '3', 'extra' => ' selected="selected"'),
            array('id' => '4', 'label' => '4'),
            array('id' => '5', 'label' => '5 (lowest)'),
        );
        return json_encode($priorities);
    }

    public function getCategories()
    {
        $category = new Category;
        return $category->search(Request::all())
            ->get(array('id','name as label'))->toJson();

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
            $results[] = array('id' => $item->id, 'label' => $item->nameAndAddress);
        }
        return json_encode($results);
    }
}

