<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortCourseModule extends Model
{
    protected $table = 'short_course_modules';

	protected $fillable = [
	   'short_course_id', 'module', 'description', 'resources'
	];
}
