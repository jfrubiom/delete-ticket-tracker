<?php

class AjaxController extends BaseController 
{

    public function getPriorities()
    {
        $priorities = array(
            array('id' => '1', 'label' => 'High'),
            array('id' => '3', 'label' => 'Medium', 'extra' => ' selected="selected"'),
            array('id' => '5', 'label' => 'Low'),
        );
        return Response::json($priorities);
    }

    public function getDepartments()
    {
        $dept = new Department;
        $found = $dept->search(Request::all())
            ->get(array('id','name as label'))->toArray();

        $user = Sentry::getUser();
        if( ! is_null($user) && !is_null($user->department_id)) {
            $this->injectTagIntoArrayForId($found, $user->department_id);
        }

        return Response::json($found);
    }

    public function getCategories()
    {
        $category = new Category;
        return Response::json($category->search(Request::all())
            ->get(array('id','name as label')));
    }

    public function getUsers()
    {
        $user = new User;

        $found = $user->search(Request::all())
            ->get(array('id', 'first_name', 'email'));

        $results = array();
        foreach($found as $item) {
            $results[] = array('id' => $item->id, 'label' => $item->nameAndAddress);
        }
        return Response::json($results);
    }


    protected function injectTagIntoArrayForId(&$array, $id, $tag=' selected="selected"')
    {
        foreach($array as &$item) {
            if($item['id']==$id) {
                $item['extra'] = $tag;
                return;
            }
        }
    }

}

