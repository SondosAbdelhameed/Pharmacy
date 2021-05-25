<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Doctor extends Model
{
	public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }

    public function my_account(){
		return $this->hasOne('App\Models\User', 'user_doctor_id');
	}

	public function user(){
   		return $this->belongsTo('App\Models\User', 'user_id');
	}
}
