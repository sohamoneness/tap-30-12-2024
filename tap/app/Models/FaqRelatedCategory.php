<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\FaqCategory;

class FaqRelatedCategory extends Model
{
    protected $table = 'faq_related_categories';

    /**
     * Get the cat1 that owns the FaqRelatedCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cat1(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'cat_id1', 'id');
    }

    /**
     * Get the cat2 that owns the FaqRelatedCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cat2(): BelongsTo
    {
        return $this->belongsTo(FaqCategory::class, 'cat_id2', 'id');
    }
	
}

