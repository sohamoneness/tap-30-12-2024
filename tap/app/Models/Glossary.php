<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    protected $table = 'glossaries';

	protected $fillable = [
	   'type_id','term', 'slug', 'definition','description', 'meta_title','meta_keywords','meta_description', 'status', 'frequency_of_use', 'frequency_description', 'importance_of_term', 'importance_description',
	   'brief_description'
	];

	public function type() {
        return $this->belongsTo('App\Models\GlossaryType', 'type_id', 'id');
    }

    public function scenarios(){
		return $this->hasMany('App\Models\GlossaryScenario', 'glossary_id', 'id');
	}
}
