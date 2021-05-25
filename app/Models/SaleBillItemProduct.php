<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleBillItemProduct extends Model
{
	public function product_date()
	{
   		return $this->hasMany('App\Models\ProductDate')->with('product');
	}
}
