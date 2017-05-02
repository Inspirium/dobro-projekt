<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller {

	public function __construct() {
		$this->middleware('auth')->except('postForm');
	}

	public function showEntries() {

	}

	public function approveEntry($id) {

	}

	public function deleteEntry($id) {

	}

	public function postForm(Request $request) {

	}
}