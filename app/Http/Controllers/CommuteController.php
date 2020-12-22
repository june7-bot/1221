<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;
class CommuteController extends Controller
{
    public function goWork(){

        $check = Event::startCheck();

        if($check){
            $res = array('status'=>404);
            return $res;

        }else{

        $goWork = Event::create([
            'title' => request()->title,
            'start_date' => request()->start_date,
            'end_date' => request()->end_date,
            'status' => 1
        ]);

        $event = Calendar::event(
            $goWork->title,
            true,
            new \DateTime($goWork->start_date),
            new \DateTime($goWork->end_date),
            'june',
            [
                'textcolor' => '#7FFFD4',
            ]
        );

        Calendar::addEvent($event);

        $res = array('status' => 200);
        return $res;
         }
    }



    public function goHome()
    {
//        $today = date("Y-m-d");
//        $check = Event::where('start_date', $today)->
//                          where('status', 0)->count();
          $check = Event::endCheck();
        if($check){
            $res = array('status'=>404);
            return $res;
        }else{
        $vacation = Event::create([
            'title' => request()->title,
            'start_date' => request()->start_date,
            'end_date' => request()->end_date,
            'status' => 0
        ]);

        $event = Calendar::event(
            $vacation->title,
            true,
            new \DateTime($vacation->start_date),
            new \DateTime($vacation->end_date . ' +1 day'),
            null,
            [
                'color' => 'black'
            ]
        );
        Calendar::addEvent($event);
        $res = array('status' => 200);
        return $res;
        }
    }
}
