<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolIntegrationCompatibility extends Model
{
    protected $table = "tool_integration_compatibilities";

    protected $fillable = [
        'tool_id',
        'title',
        'description',
        'icon'
    ];
}
