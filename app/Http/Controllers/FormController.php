<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class FormController extends Controller {

	public function __construct() {
		$this->middleware('auth')->except('postForm');
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

		$entry = new Entry([
			'name' => $request->get('name'),
			'description' => $request->get('description'),
			'marker' => $request->get('marker'),
			'location' => $request->get('location')
		]);

		return response()->json(['message' => 'success']);
	}
}