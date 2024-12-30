<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function file() {
        return $this->belongsTo('App\Models\ProjectFile', 'file_id', 'id');
    }
    public function task() {
        return $this->belongsTo('App\Models\ProjectTask', 'task_id', 'id');
    }
    public function comment() {
        return $this->belongsTo('App\Models\ProjectComment', 'comment_id', 'id');
    }
    public function feedback() {
        return $this->belongsTo('App\Models\ProjectFeedback', 'feedback_id', 'id');
    }
}
