<?php

use Carbon\Carbon;

class AjaxTicketsController extends BaseController
{

    public function getDataTable()
    {

        $foo = Ticket::open();       
        // $foo = array(
        //     array('foo','bar','bazz','buzz','priority','due','updated'),
        //     array('2','summary','assignee','creator','p','d','u'),
        // );

        return Datatables::of($foo)->make();

        // return Response::json($foo);
        dd(Input::all());
        // return 'foo';
    }

    /**
     * Find tickets that match a given criteria
     */
    public function getFind()
    {
        $type = Request::get('type');
        $dept = Request::get('dept');
        $category = Request::get('category');

        // Set the filter, based on type of ticket
        if ($type=='' or $type=='1') {
            $tickets = Ticket::unassigned();
        } elseif ($type=='2') {
            $tickets = Ticket::open();
        } elseif ($type=='3') {
            $tickets = Ticket::closed();
        } elseif ($type=='4') {
            $tickets = Ticket::pastDue();
        } elseif ($type=='5') {
            $tickets = Ticket::recentlyUpdated();
        } elseif ($type=='6') {
            $tickets = Ticket::mine();
        } elseif ($type=='7') {
            $tickets = Ticket::forAll();
        } else {
            throw new \UnexpectedValueException;
        }

        if ($dept && ! $dept==0) {
            $tickets->forDepartment($dept);
        }
        if ($category && ! $category==0) {
            $tickets->forCategory($category);
        }

        $return = array();
        foreach($tickets->get() as $ticket) {
            $due = Carbon::createFromTimestamp(strtotime($ticket->due));

            $data = array();
            $data['id'] = $ticket->id;
            $data['summary'] = $ticket->summary;
            $data['assignee'] = $ticket->assignedTo ? $ticket->assignedTo->first_name : '<unassigned>';
            $data['creator']  = $ticket->createdBy ? $ticket->createdBy->first_name : '';
            $data['priority'] = $ticket->priorityText;
            $data['due'] = $ticket->due == 0 ? '' : $due->format('M j');
            $data['updated'] = $ticket->updated_at->format('n/j/Y g:i A');
            $return[] = $data;
        }

        return Response::json($return);
    }

    public function getTypes()
    {
        $types = array(
            array('id'=>1, 'label'=>'Unassigned Tickets', 'extra'=>' selected'),
            array('id'=>2, 'label'=>'Open Tickets'),
            array('id'=>3, 'label'=>'Closed Tickets'),
            array('id'=>4, 'label'=>'Past Due Tickets'),
            array('id'=>5, 'label'=>'Recently Updated Tickets'),
            array('id'=>6, 'label'=>'My Tickets'),
            array('id'=>7, 'label'=>'All Tickets'),
        );

        return Response::json($types);        
    }

    public function getCounts()
    {
        $requests = Request::all();



        // $tickets = Ticket::forAll();


        $dept = Request::get('dept');
        $cat = Request::get('category');

        $counts = array(
            'open' => $this->getTicketScope($dept, $cat)->open()->count(),
            'past' => $this->getTicketScope($dept, $cat)->pastDue()->count(),
            'todo' => $this->getTicketScope($dept, $cat)->unassigned()->count(),
            'mine' => $this->getTicketScope($dept, $cat)->mine()->count(),
        );

        // $counts = array(
        //     'open' => $open,
        //     'past' => $past,
        //     // 'todo' => $todo,
        //     // 'mine' => $mine,
        // );


        // var_dump($counts);
        return Response::json($counts);
    }

    // public function getTicketList()

    private function getTicketScope($dept, $category)
    {
        if ($dept) {
            return Ticket::forDepartment($dept);
        }
        if ($category) {
            return Ticket::forCategory($category);
        }
        return Ticket::forAll();
    }

}