<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     //for group
     public function group() {
        return $this->belongsTo('App\Models\ClientGroup', 'client_group', 'id');
    }

    public function currencyDetail() {
        return $this->belongsTo('App\Models\Currency', 'currency', 'id');
    }

    public function commercial() {
        return $this->belongsTo('App\Models\ChargeLimit', 'commercials', 'id');
    }

    public function projects()
    {
        return $this->hasMany('\App\Models\Project', 'client_id', 'id');
    }
}
