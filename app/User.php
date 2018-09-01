<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\CanResetPassword;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'honorific',
        'date_of_birth',
        'phone_number',
        'mobile_number',
        'address',
        'postcode',
        'region',
        'city',
        'country',
        'active',
        'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeByActivationColumns(Builder $builder, $email, $token){
        return $builder->where('email', $email)->where('activation_token', $token);
    }

    public function scopeByEmail(Builder $builder, $email){
        return $builder->where('email', $email);
    }

    //Every User can have many Contracts
    public function contracts(){
      return $this->hasMany('App\Contract');
    }
    //Every User can have many Properties
    public function properties(){
      return $this->hasMany('App\Property');
    }

    public function auctionDateOfBirth(){
        return Carbon::createFromFormat('m/d/Y', $this->date_of_birth);
    }

}
