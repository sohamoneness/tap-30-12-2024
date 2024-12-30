<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ToolAreaofInterest extends Model
{
    public static function insertData($data, $count, $successArr, $failureArr) {
        $value = DB::table('tool_areaof_interests')->where('title', $data['title'])->get();
        if($value->count() == 0) {
           DB::table('tool_areaof_interests')->insert($data);
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
    public function category() {
        return $this->belongsTo('App\Models\ToolAreaofInterestCategory', 'cat_id', 'id');
    }
    public function subcategory() {
        return $this->belongsTo('App\Models\ToolSubCategory', 'sub_cat_id', 'id');
    }

} 
