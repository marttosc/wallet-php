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
        return $this->hasOne(Wallet\Models\Flag::class, 'id', 'flag_id');
    }

    /**
     * Get the user associated with the card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Wallet\Models\User::class, 'user_id', 'id');
    }

    /**
     * Get the card's number.
     *
     * @return string
     */
    public function getCardAttribute()
    {
        return $this->parseCard($this->attributes['card']);
    }

    /**
     * Add spaces to card number.
     *
     * @param  string  $card
     * @return string
     */
    protected function parseCard($card)
    {
        return trim(chunk_split(str_replace(' ', '', $card), 4, ' '));
    }
}
