<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlossaryScenario extends Model
{
    protected $table = 'glossary_scenarios';

	protected $fillable = [
	   'glossary_id', 'scenario', 'explanation'
	];
}
