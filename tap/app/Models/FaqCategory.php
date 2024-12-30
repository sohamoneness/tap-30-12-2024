<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_categories';

	protected $fillable = [
	   'title', 'slug','description', 'meta_title','meta_keywords','meta_description', 'status'
	];
}
