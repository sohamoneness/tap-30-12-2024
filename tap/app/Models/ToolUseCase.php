<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolUseCase extends Model
{
    protected $table = "tool_use_cases";

    protected $fillable = [
        'tool_id',
        'title',
        'description',
        'url'
    ];
}
