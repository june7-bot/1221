<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;
class CommuteController extends Controller
{
    public function goWork(){

        $goWork = Event::create([
            'title' => request()->title,
            'start_date' => request()->start_date,
            'end_date' => request()->end_date,
        ]);

        $event [] = Calendar::event(
            $goWork->title,
            true,
            new \DateTime($goWork->start_date),
            new \DateTime($goWork->end_date),
            null,
            [
                'color' => '00008B',
            ]
        );
        Calendar::addEvents($event);
        $res = array('status' => 200);
        return $res;
    }



    public function goHome()
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
                'color' => 'black'
            ]
        );
        Calendar::addEvents($event);
        $res = array('status' => 200);
        return $res;
    }
}
