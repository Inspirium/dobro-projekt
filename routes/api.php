<?php
Route::group(['middleware' => 'cors'], function() {
Route::get('entries', 'FormController@getEntries');
});