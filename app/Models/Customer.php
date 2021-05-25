<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Customer extends Model
{

	protected $guarded =[];

	protected $fillable = [
        'isActive'
    ];

    /*public function tree(){
   		return $this->belongsTo('App\Models\TreeAccount', 'tree_id');
	}*/

	public function company(){
		return $this->hasOne('App\Models\CustomerCompanyInfo', 'customer_id');
	}

	public function insurance_class(){
		return $this->hasOne('App\Models\InsuranceCustomer', 'customer_id')->with('class');
	}

	public function user(){
   		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function activation(){
   		return $this->belongsTo('App\Models\Activation', 'isActive');
	}

	public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }

    public function tree(){
    	return $this->morphOne(TreeAccount::class,'tree_accountable');
    }


}
