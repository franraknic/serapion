<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

	protected $table = 'movies';

	protected $fillable = [
		'name', 'description'
	];

	protected $casts = [
	];

	protected $hidden = [];

    /*
    // for future use of type of media - movie,series, documentary etc.
	public function type()
	{
		return $this->belongsTo(Type::class);
    }
    */

}
