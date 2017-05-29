<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FormController extends Controller {

	public function __construct() {
		$this->middleware('auth')->except(['postForm', 'showPublic', 'getEntries']);
		$this->middleware('cors')->only(['postForm', 'getEntries']);
	}

	public function showPublic() {
		$entries = Entry::where('approved', 1)->get();
		return view('home', compact('entries'));
	}

	public function showEntries() {

			$entries = Entry::orderBy( 'id', 'dsc' )->get(); //TODO: pagination

		return view('entries', compact('entries'));
	}

	public function getEntries() {
	$entries = Cache::get('entries');
	if (!$entries) {
		$entries = Entry::all(); //TODO: pagination
		Cache::put('entries', $entries, 5);
	}
		return response()->json($entries);
	}

	public function approveEntry($id) {
		$entry = Entry::find($id);
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
		$entries = Entry::where('approved', 1)->get();
		return view('sent', compact('entries'));
	}
}