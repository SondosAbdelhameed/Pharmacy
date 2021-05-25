<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Store extends Model
{
	public function department()
	{
   		return $this->belongsTo('App\Models\Department', 'department_id');
	}

	public function main_store()
	{
   		return $this->belongsTo('App\Models\Store', 'store_parent_id');
	}

	public function getStoreNameAttribute($value) {
        return $this->{'store_name_' . App::getLocale()};
    }

    public function tree()
	{
   		return $this->morphOne(TreeAccount::class,'tree_accountable');
	}
}
