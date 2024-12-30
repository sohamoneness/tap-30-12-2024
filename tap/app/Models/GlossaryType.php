<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlossaryType extends Model
{
    protected $table = 'glossary_types';

	protected $fillable = [
	   'title', 'slug', 'meta_title','meta_keywords','meta_description', 'status'
	];
}
