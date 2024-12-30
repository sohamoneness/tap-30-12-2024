<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Event extends Model
{
    public function eventCategory() {
        return $this->belongsTo('App\Models\EventType', 'type', 'id');
    }

    public static function insertData($data, $count, $successArr, $failureArr) {
        $value = DB::table('events')->where('title', $data['title'])->get();
        if($value->count() == 0) {
           DB::table('events')->insert($data);
           array_push($successArr, $data['title']);
            $count++;
        } else {
            array_push($failureArr, $data['title']);
        }
        // return $count;
        $resp = [
            "count" => $count,
            "successArr" => $successArr,
            "failureArr" => $failureArr
        ];
        return $resp;
    }
}
