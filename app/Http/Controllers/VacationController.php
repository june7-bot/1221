<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;

class VacationController extends Controller
{
    public function index()
    {
        $vacation = Event::create([
            'title' => request()->title,
            'start_date' => request()->start_date,
            'end_date' => request()->end_date,
        ]);

        $event [] = Calendar::event(
            $vacation->title,
            true,
            new \DateTime($vacation->start_date),
            new \DateTime($vacation->end_date . ' +1 day'),
            null,
            [
                'color' => '#f05050',
            ]
        );
        Calendar::addEvents($event);
        $res = array('status' => 200);
        return $res;
    }


}
