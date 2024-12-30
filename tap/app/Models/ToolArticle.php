<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolArticle extends Model
{
    public function articleDetails() {
        return $this->belongsTo('App\Models\Article', 'article_id', 'id');
    }

    public function toolDetails() {
        return $this->belongsTo('App\Models\ToolAreaofInterest', 'tool_id', 'id');
    }
}
