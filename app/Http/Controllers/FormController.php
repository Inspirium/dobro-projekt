<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class FormController extends Controller {

	public function __construct() {
		$this->middleware('auth')->except(['postForm', 'showPublic']);
	}

	public function showPublic() {
		$entries = Entry::all();
		return view('home', compact('entries'));
	}

	public function showEntries() {
		$entries = Entry::all(); //TODO: pagination
		return view('entries', compact('entries'));
	}

	public function approveEntry($id) {
		$entry = Entry::firstOrFail($id);
		$entry->approved = 1;
		$entry->save();
		return redirect('admin');
	}

	public function deleteEntry($id) {
		Entry::destroy($id);
		return redirect('admin');
	}

	public function postForm(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'marker' => 'required',
			'location' => 'required'
		]);

		$entry = Entry::create([
			'name' => $request->get('name'),
			'description' => $request->get('description'),
			'marker' => $request->get('marker'),
			'location' => $request->get('location')
		]);
		return redirect('/');
	}
}