<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
	public function booking()
	{
	   return $this->hasMany(Booking::class, 'toy_id', 'id');
    }

    public static $createRules = [
        'name' => 'required|unique:toys|max:45',
        'price' => 'required|max:45',
    ];
}
