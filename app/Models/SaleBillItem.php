<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleBillItem extends Model
{

	public function bill_item_product()
	{
   		return $this->hasMany('App\Models\SaleBillItemProduct')->with('product_date');
	}

	public function item()
	{
   		return $this->belongsTo('App\Models\Item', 'item_id');
	}
}
