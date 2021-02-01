<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
	public function user()
	{
	   return $this->belongsTo(User::class, 'user_id', 'id');
	}
    
	public function toy()
	{
	   return $this->belongsTo(Toy::class, 'toy_id', 'id');
	}
}
