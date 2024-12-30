<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolBenefit extends Model
{
    protected $table = "tool_benefits";


    protected $fillable = [
        'tool_id',
        'title',
        'description'
    ];
}
