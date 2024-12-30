<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortCourseTest extends Model
{
    protected $table = 'short_course_tests';

	protected $fillable = [
	   'short_course_id', 'title', 'description'
	];
}
