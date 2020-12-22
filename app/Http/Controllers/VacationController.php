<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;

class VacationController extends Controller
{
    public function index()
    {

        $vacation = Event::insertDb(request()->title,request()->start_date, request()->end_date, 2 );

        $event [] = Calendar::event(
            $vacation->title,
            true,
            new \DateTime($vacation->start_date),
            new \DateTime($vacation->end_date . ' +1 day'),
            null,
                [
                'color' => "#444444",
                'url' => '#',
                 ]
        );
        Calendar::addEvents($event);
        $res = array('status' => 200);
        return $res;
    }


}
