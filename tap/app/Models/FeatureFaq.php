<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureFaq extends Model
{
    protected $table = 'feature_faqs';

	protected $fillable = [
	   'feature_id', 'question','answer'
	];
}
