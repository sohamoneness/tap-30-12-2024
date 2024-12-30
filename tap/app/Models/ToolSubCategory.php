<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ToolAreaofInterest;

class ToolSubCategory extends Model
{
    /**
     * Get all of the comments for the ToolSubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function latestThreeTools(): HasMany
    {
        return $this->hasMany(ToolAreaofInterest::class, 'sub_cat_id', 'id')->orderBy('id', 'desc')->take(3);
    }
    
}
