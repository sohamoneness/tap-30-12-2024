<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureDetail extends Model
{
    protected $table = 'feature_details';

	protected $fillable = [
	   'feature_id', 'title','sub_title', 'description', 'button_name', 'button_link'
	];
}
