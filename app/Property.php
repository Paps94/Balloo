<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
  protected $fillable = [
    'Type',
    'Condition',
    'PricePerWeek',
    'NumberOfBedrooms',
    'NumberOfBathrooms',
    'NumberOfKitchens',
    'Landline',
    'PhoneNumber',
    'Address',
    'PostalCode',
    'City',
    'Country',
    'user_id'
  ];

  //Every Property belongs to a running contract
  public function contract(){
    return $this->belongsTo('App\Contract');
  }
  //Every Property belongs to a person
  public function user(){
    return $this->belongsTo('App\User', 'user_id', 'id');
  }
}
