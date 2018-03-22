<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	// Table Name 
	protected $table = 'students';
	// Primary Key 
	public $primaryKey = 'id';
	// Timestamp 
	public $timestamp = true;

	public function user(){
		return $this->belongsTo('App\User');
	}
}
