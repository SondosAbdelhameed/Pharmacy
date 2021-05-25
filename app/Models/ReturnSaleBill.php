<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class ReturnSaleBill extends Model
{
	protected $fillable = [
        'isClosed',
        'payment_status',
    ];

	public function bill()
	{
   		return $this->belongsTo('App\Models\SaleBill', 'bill_id')->with('customer');
	}

	/*public function return_products()
	{
   		return $this->hasMany('App\Models\ReturnPurchaseProduct','return_id')->with('bill_products');
	}

	public function return_payments()
	{
   		return $this->hasMany('App\Models\ReturnPurchaseBillPayment','return_id');
	}*/

	public function user()
	{
   		return $this->belongsTo('App\Models\User', 'user_id');
	}
}
