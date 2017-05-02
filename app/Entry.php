<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model {
	use SoftDeletes;

	protected $table = 'entries';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'description', 'marker', 'location'];
}