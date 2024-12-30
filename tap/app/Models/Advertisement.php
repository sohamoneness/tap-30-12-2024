<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model {

    protected $table = 'advertisements';

    public function advertisement_category() {
        return $this->belongsTo('App\Models\AdvertisementCategory', 'article_category_id', 'id');
    }


    public function user() {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
