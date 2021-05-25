<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Supplier extends Model
{

	protected $fillable = [
        'isActive'
    ];
    
	public function company()
	{
   		return $this->hasOne('App\Models\SupplierCompanyInfo', 'supplier_id');
	}

	public function user()
	{
   		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function tree()
	{
   		return $this->morphOne(TreeAccount::class,'tree_accountable');
	}

	public function activation()
	{
   		return $this->belongsTo('App\Models\Activation', 'isActive');
	}

	public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }
}
