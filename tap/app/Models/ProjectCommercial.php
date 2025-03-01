<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCommercial extends Model {
    protected $table = 'project_commercials';

    public function currency()
    {
        return $this->belongsTo('\App\Models\Currency', 'currency_id', 'id');
    }
}
