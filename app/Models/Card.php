<?php

namespace Wallet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'flag_id', 'card', 'expires_in', 'cvc', 'limit', 'closes_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'cvc',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expires_in', 'closes_at', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'limit'   => 'double',
    ];

    /**
     * Get the flag associated with the card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function flag()
    {
        return $this->hasOne('Wallet\Models\Flag', 'id', 'flag_id');
    }

    /**
     * Get the user associated with the card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Wallet\Models\User', 'user_id', 'id');
    }

    /**
     * Scope a query to only include cards that close in less than 15 days.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClosing($query)
    {
        $carbon = app(\Carbon\Carbon::class);

        return $query->get()->filter(function($card) use ($carbon) {
            return $card->closes_at->diff($carbon->now())->days <= 15;
        });
    }

    /**
     * Scope a query to only include unique flags used in the cards.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUniqueFlags($query)
    {
        return $query->get()->unique(function($card) {
            return $card->flag_id;
        });
    }

    /**
     * Scope a query to get the cumulative limit.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCumulativeLimit($query)
    {
        return $query->get()->sum(function($card) {
            return $card->limit;
        });
    }
}
