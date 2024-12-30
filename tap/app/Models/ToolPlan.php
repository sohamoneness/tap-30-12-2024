<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolPlan extends Model
{
    protected $table = "tool_plans";


    protected $fillable = [
        'tool_id',
        'title',
        'short_description',
        'long_description',
        'link',
        'amount',
    ];
}
