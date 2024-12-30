<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PitchBlogCategory;

class Blogger extends Model
{
    

    protected $fillable = [
        'user_id',
        'website_name',
        'website_description',
        'category',
        'domain_authority',
        'alexa_rank',
        'link',
        'email_address',
    ];
    
    public function categorypitch(): BelongsTo
    {
        return $this->belongsTo(PitchBlogCategory::class, 'category', 'id');
    }

}
