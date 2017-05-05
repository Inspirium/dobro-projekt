<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model {
	use SoftDeletes;

	protected $table = 'entries';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'description', 'marker', 'location'];

	public function getLocationAttribute($key) {
		$locations = ['Grad Zagreb',
                            'Bjelovarsko-bilogorska županija',
                            'Brodsko-posavska županija',
                            'Dubrovačko-neretvanska županija',
                            'Istarska županija',
                            'Karlovačka županija',
                            'Koprivničko-križevačka županija',
                            'Krapinsko-zagorska županija',
                            'Ličko-senjska županija',
                            'Međimurska županija',
                            'Osječko-baranjska županija',
                            'Požeško-slavonska županija',
                            'Primorsko-goranska županija',
                            'Šibensko-kninska županija',
                            'Sisačko-moslavačka županija',
                            'Splitsko-dalmatinska županija',
                            'Varaždinska županija',
                            'Virovitičko-podravska županija',
                            'Zadarska županija',
                            'Zagrebačka županija'];
		return $locations[$key-1];
	}
}