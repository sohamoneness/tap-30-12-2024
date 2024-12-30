<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisementCategory extends Model {

    protected $table = 'advertisement_categories';

    public function advertisement()
	{
    	return $this->hasMany(Advertisement::class);
	}
}
