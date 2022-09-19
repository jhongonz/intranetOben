<?php

use Illuminate\Support\Facades\Route;

#Sandbox's routes
Route::get('/sandbox','Sandbox@index')->name('sandbox');

#Login's routes
Route::get('/', function() {

    if (!\Illuminate\Support\Facades\Auth::check()) {

        return redirect()->route('manager.login');
    }

    return redirect()->route('manager.home');

})->name('manager.index');

#Routes guest
Route::middleware(['guest'])->group(function(){

    #Login process
    Route::get('/login','LoginController@index')->name('manager.login');
    Route::post('/login','LoginController@authentication')->name('manager.authentication');

});

#Routes protected with auth
Route::middleware(['auth'])->group(function() {

    #User process sesion
    Route::get('/home','LoginController@home')->name('manager.home');
    Route::get('/logout','LoginController@logout')->name('manager.logout');
    Route::post('/change-lenguage','LoginController@changeLenguage')->name('manager.change-lenguage');

    #Profile module
    Route::prefix('profiles')->group(function(){
        Route::get('/','ProfileController@index')->name('manager.profile.index');
    });
});
