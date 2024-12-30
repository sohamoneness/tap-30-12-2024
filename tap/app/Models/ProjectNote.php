<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectNote extends Model
{
    protected $table='project_notes';
    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }

    // public function project()
    // {
    //     return $this->belongsTo('\App\Models\Project', 'project_id', 'id');
    // }
}
