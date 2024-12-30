<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolHowToUse extends Model
{
    protected $table = "tool_how_to_uses";

    protected $fillable = [
        'tool_id',
        'title',
        'description',
        'icon'
    ];
}
