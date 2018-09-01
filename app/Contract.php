<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  protected $fillable = [
      'StartDate',
      'EndDate',
      'PricePerWeek',
      'NumberOfTenats',
      'ContractLength',
      'BillsIncluded',
      'Deposit',
      'user_id',
      'property_id',
  ];
  //Every contract must belong to a user
  public function user(){
    return $this->belongsTo('App\User', 'id', 'user_id');
  }

  //Every contract must belong to a property
  public function property(){
    return $this->hasOne('App\Property', 'id', 'property_id');
  }

  // Turn tinyInt to  String | 1 = Yes / 0 = No
  public function getBillsAttribute(){
    if ($this->BillsIncluded) {
      return "Yes";
    }
      return "No";
  }
}
