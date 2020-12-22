<?php

namespace App;
date_default_timezone_set('Asia/Seoul');
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function scopeStartCheck($query)
    {
        $today = date("Y-m-d");
        return $query->where('start_date', $today)->where('status', 0)->count();
    }

    public function scopeEndCheck($query)
    {
        $today = date("Y-m-d");
        return $query->where('start_date', $today)->where('status', 0)->count();
    }

    public function scopeInsertDb($query, $t, $sd, $ed, $s)
    {
        return $query->create([
            'title' => $t,
            'start_date' => $sd,
            'end_date' => $ed,
            'status' => $s
        ]);
    }
}
