<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentAdvertisementProposal extends Model
{
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

     public function job() {
        return $this->belongsTo('App\Models\Advertisement', 'job_id', 'id');
    }
}

