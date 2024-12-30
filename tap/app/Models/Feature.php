<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';

	protected $fillable = [
	   'title', 'slug','sub_title', 'brief_description', 'news_letter_section_title', 'news_letter_section_sub_title', 'news_letter_section_button_name', 'join_cummunity_section_title', 'join_cummunity_section_sub_title', 'join_cummunity_section_brief_description', 'join_cummunity_section_button_name', 'status', 'faq_section_title', 'faq_section_sub_title'
	];

	public function details(){
		return $this->hasMany('App\Models\FeatureDetail', 'feature_id', 'id');
	}
}
