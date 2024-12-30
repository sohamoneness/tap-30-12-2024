<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PitchBlog extends Model
{
    public function category() {
        return $this->belongsTo('App\Models\PitchBlogCategory', 'cat_id', 'id');
    }
}
