<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTask extends Model {

    use SoftDeletes;
    protected $table = 'project_tasks';

    public function statusDetail()
    {
        return $this->belongsTo('\App\Models\ProjectStatus', 'status', 'slug');
    }

    public function projectDetail()
    {
        return $this->belongsTo('\App\Models\Project', 'project_id', 'id');
    }  
    public function client()
    {
        return $this->belongsTo('\App\Models\Client', 'client_id', 'id');
    }

}
