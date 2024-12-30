<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\PlansWithPrice;

class UserSubscription extends Model
{
    protected $table = "user_subscriptions";

    /**
     * Get the user that owns the UserSubscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the plan_with_price_id that owns the UserSubscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan_with_price(): BelongsTo
    {
        return $this->belongsTo(PlansWithPrice::class, 'plan_with_price_id', 'id');
    }


}
