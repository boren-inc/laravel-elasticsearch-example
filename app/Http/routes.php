<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'search', 'uses' => function(){

    // Check if user has send a search query
    if($query = Input::get('query', false)) {
        // Use the Elasticsearch method to search Elasticsearch

//        $posts = App\Post::search($query);

        $posts = App\Post::searchByQuery(['match'=>['title'=> Input::get('query', '')]]);

    } else {
        $posts = App\Post::all();
    }

    return View::make('home', compact('posts'));
}]);
