<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// page d'accueil connectée à la méthode index du FrontController
Route::get('/', 'FrontController@index');

// Afficher un robot en fonction de l'id du robot on peut également passer un slug
Route::get('/robot/{id}/{slug?}', 'FrontController@showRobot');

Route::get('/category/{id}/{slug?}', 'FrontController@showRobotByCat');

// page contact et mentions légales
Route::get('contact', 'FrontController@showContact');
Route::get('mentions-legales', 'FrontController@showMentions');

