<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortCourse extends Model
{
    protected $table = 'short_courses';

	protected $fillable = [
	   'title', 'image', 'introduction','key_learnings','hours_to_complete',  'status'
	];
}
