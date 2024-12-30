<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFeedback extends Model
{
    protected $table='project_feedbacks';
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
