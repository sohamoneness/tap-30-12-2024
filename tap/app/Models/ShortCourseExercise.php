<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortCourseExercise extends Model
{
    protected $table = 'short_course_exercises';

	protected $fillable = [
	   'short_course_id', 'title', 'description'
	];
}
