<?php

namespace Wallet\Models;

use ZipCode;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'cpf', 'birthdate', 'cep', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthdate', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(strtolower(trim($value)));
    }

    /**
     * Set the user's last name.
     *
     * @param  string  $value
     * @return string
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(strtolower(trim($value)));
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * Get the user's CEP info.
     *
     * @return Object
     */
    public function getCepAttribute()
    {
        return ZipCode::find($this->attributes['cep'])->getObject();
    }

    /**
     * Get the cards for the user.
     */
    public function cards()
    {
        return $this->hasMany('Wallet\Models\Card');
    }

    /**
     * Get the sum of the cards limit.
     *
     * @return float
     */
    public function cumulativeLimit()
    {
        return $this->cards->sum('limit');
    }

    /**
     * Get the flags used by user on their cards.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function uniqueFlags()
    {
        return $this->cards->unique('flag_id');
    }

    public function closingCards($period = 15)
    {
        $carbon = app(\Carbon\Carbon::class);

        return $this->cards->filter(function($card) use ($period, $carbon) {
            return $card->closes_at->diff($carbon->now())->days <= $period;
        });
    }
}
