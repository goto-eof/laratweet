<?php

Route::controller('user', 'UserController');
Route::controller('tweet', 'TweetController');
Route::get('/', function () {
    return View::make('index', array('title' => 'Home page'));
});


// http://localhost/json/ciao -> ritorna ["ciao", "mondo"]
/*
Route::get('json/{data}', function ($data) {
    return Response::json(array($data, 'mondo'));
});
*/

// http://localhost/ -> ritorna Ciao Mondo!
/*Route::get('/', function () {
    Return "Ciao Mondo!";
});*/