<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employees';
     protected $fillable = [
      'fname','mname','lname',
      'gender', 'status', 'position' 
   ];

   public function departments() {

   	return $this->belongsTo('App\Department');
   }

}
