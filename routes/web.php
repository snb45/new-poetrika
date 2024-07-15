<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\audioController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\socialController;
use App\Http\Controllers\videoController;
use App\Http\Controllers\wordsController;
use Illuminate\Support\Facades\Route;

Route::get('/',                                 [HomeController::class, 'index']);

Auth::routes();

Route::get('/home',                             [HomeController::class, 'index'])->name('home');
Route::get('/clear',                            [HomeController::class, 'clear'])->name('clear');
Route::get('/search',                           [HomeController::class, 'search'])->name('search');

//panel
Route::get('/dashboard',                 [adminController::class, 'index'])->name('admin');

//PUBLIC CONTROLLER
// You can also use auth middleware to prevent unauthenticated users
Route::get('/',                                     [HomeController::class, 'index'])->name('home');
Route::get('/viewPoetryByCategories/{id}',          [HomeController::class, 'viewPoetryByCategories'])->name('viewPoetryByCategories');
Route::get('/viewPoet/{id}',                        [HomeController::class, 'viewPoet'])->name('viewPoet');
Route::get('/viewWordPoet/{id}',                    [HomeController::class, 'viewWordPoet'])->name('viewWordPoet');
Route::get('/viewByPoet/{id}',                      [HomeController::class, 'viewByPoet'])->name('viewByPoet');
Route::get('/poetsVideos',                          [HomeController::class, 'poetsVideos'])->name('poetsVideos');
Route::get('/noFound',                              [HomeController::class, 'noFound'])->name('noFound');
Route::get('/aboutPage',                            [HomeController::class, 'aboutPage'])->name('aboutPage');
Route::get('/mariagorethPoetry',                    [HomeController::class, 'mariagorethPoetry'])->name('mariagorethPoetry');
Route::get('/featuredPoets',                        [HomeController::class, 'featuredPoets'])->name('featuredPoets');
Route::get('/autoSearch',                           [HomeController::class, 'autoSearch'])->name('autoSearch');
Route::get('/reset',                                [HomeController::class, 'reset'])->name('reset');
Route::post('/forgetPassword',                      [HomeController::class, 'forgetPassword'])->name('forgetPassword');
Route::get('/resetPassword/{id}',                   [HomeController::class, 'resetPassword'])->name('resetPassword');
Route::post('/saveNewPassword/{id}',                [HomeController::class, 'saveNewPassword'])->name('saveNewPassword');
Route::get('/likes/{id}',                           [HomeController::class, 'likes'])->name('likes');
Route::get('changeStatus',                          [HomeController::class, 'changeStatus']);
Route::get('/allBooks',                                   [HomeController::class, 'allBooks'])->name('allBooks');
Route::get('/allBooksByCategory/{id}',                                   [HomeController::class, 'allBooksByCategory'])->name('allBooksByCategory');
Route::get('notFound',                                   [HomeController::class, 'notFound'])->name('notFound');


Route::get('/allPoetry',                              [HomeController::class, 'allPoetry'])->name('allPoetry');
Route::get('/allPoetrikaVideos',                      [HomeController::class, 'allPoetrikaVideos'])->name('allPoetrikaVideos');
Route::get('/allAudios',                              [HomeController::class, 'allAudios'])->name('allAudios');
Route::get('/cardsPost',                              [HomeController::class, 'cardsPost'])->name('cardsPost');
Route::get('/viewCards/{id}',                         [HomeController::class, 'viewCards'])->name('viewCards');
Route::get('/viewUserCards/{id}',                     [HomeController::class, 'viewUserCards'])->name('viewUserCards');


//panel CONTROLLER
// You can also use auth middleware to prevent unauthenticated users
//Route::group(['middleware' => 'auth'], function () {
Route::get('/panel',      [adminController::class, 'index'])->name('admin');
Route::get('/panel/notFoundPage',   [adminController::class, 'notFoundPage'])->name('notFoundPage');


//CATEGORIES
Route::get('/panel/categories',             [categoryController::class, 'categories'])->name('categories');
Route::get('/panel/deleteCategories/{id}',  [categoryController::class, 'deleteCategories'])->name('deleteCategories');
Route::get('/panel/editCategories/{id}',    [categoryController::class, 'editCategories'])->name('editCategories');
Route::post('/panel/saveCategories',        [categoryController::class, 'saveCategories'])->name('saveCategories');
Route::post('/panel/updateCategories/{id}',      [categoryController::class, 'updateCategories'])->name('updateCategories');


//VIDEO POETS
Route::get('/panel/video',                  [videoController::class, 'video'])->name('video');
Route::post('/panel/saveVideo',             [videoController::class, 'saveVideo'])->name('saveVideo');
Route::get('/panel/approveVideo/{id}',      [videoController::class, 'approveVideo'])->name('approveVideo');
Route::get('/panel/disApproveVideo/{id}',   [videoController::class, 'disApproveVideo'])->name('disApproveVideo');
Route::get('/panel/poetOfTheWeekVideo/{id}',[adminController::class, 'poetOfTheWeekVideo'])->name('poetOfTheWeekVideo');

//AUDIO POETS
Route::get('/panel/approveAudio/{id}',              [audioController::class, 'approveAudio'])->name('approveAudio');
Route::get('/panel/disApproveAudio/{id}',           [audioController::class, 'disApproveAudio'])->name('disApproveAudio');
Route::get('/panel/audio',                          [audioController::class, 'audio'])->name('audio');
Route::post('/panel/saveAudio',                     [audioController::class, 'saveAudio'])->name('saveAudio');
Route::get('/panel/editAudio/{id}',                 [audioController::class, 'editAudio'])->name('editAudio');
Route::post('/panel/updateAudio/{id}',              [audioController::class, 'updateAudio'])->name('updateAudio');
Route::get('/panel/poetOfTheWeekAudio/{id}',       [adminController::class, 'poetOfTheWeekAudio'])->name('poetOfTheWeekAudio');


//CARD
Route::get('/panel/manageCards',                    [cardController::class, 'manageCards'])->name('manageCards');
Route::post('/panel/saveCard',                      [cardController::class, 'saveCard'])->name('saveCard');
Route::get('/panel/deleteCard/{id}',                [cardController::class, 'deleteCard'])->name('deleteCard');
Route::get('/panel/poetOfTheWeekCard/{id}',         [adminController::class, 'poetOfTheWeekCard'])->name('poetOfTheWeekCard');
Route::get('/panel/approveCard/{id}',           [adminController::class, 'approveCard'])->name('approveCard');
Route::get('/panel/disApproveCard/{id}',        [adminController::class, 'disApproveCard'])->name('disApproveCard');

//BOOKS
Route::get('/panel/myBooks',                    [adminController::class, 'myBooks'])->name('myBooks');
Route::get('/panel/manageBooks',                [adminController::class, 'manageBooks'])->name('manageBooks');
Route::post('/panel/saveBook',                  [adminController::class, 'saveBook'])->name('saveBook');
Route::get('/panel/deleteBook/{id}',            [adminController::class, 'deleteBook'])->name('deleteBook');
Route::get('/panel/approveBook/{id}',           [adminController::class, 'approveBook'])->name('approveBook');
Route::get('/panel/disApproveBook/{id}',        [adminController::class, 'disApproveBook'])->name('disApproveBook');


//WORDS POETS
Route::get('/panel/poetOfTheWeekWord/{id}', [adminController::class, 'poetOfTheWeekWord'])->name('poetOfTheWeekWord');
Route::get('/panel/approveWord/{id}',       [wordsController::class, 'approveWord'])->name('approveWord');
Route::get('/panel/disApproveWord/{id}',    [wordsController::class, 'disApproveWord'])->name('disApproveWord');
Route::get('/panel/words',                  [wordsController::class, 'words'])->name('words');
Route::get('/panel/editWords/{id}',         [wordsController::class, 'editWords'])->name('editWords');
Route::post('/panel/updateWord/{id}',       [wordsController::class, 'updateWord'])->name('updateWord');
Route::post('/panel/deleteWord/{id}',       [wordsController::class, 'deleteWord'])->name('deleteWord');
Route::post('/panel/saveWord',              [wordsController::class, 'saveWord'])->name('saveWord');


//ACCOUNTS
Route::get('/panel/accounts/',          [adminController::class, 'accounts'])->name('accounts');
Route::get('/panel/viewAccount/{id}',   [adminController::class, 'viewAccount'])->name('viewAccount');
Route::get('/panel/myAccount',          [adminController::class, 'myAccount'])->name('myAccount');
Route::post('/panel/updateUser/{id}',   [adminController::class, 'updateUser'])->name('updateUser');


//ALL POETS
Route::get('/panel/allWords/',          [adminController::class, 'allWords'])->name('allWords');
Route::get('/panel/allAudio/',          [adminController::class, 'allAudio'])->name('allAudio');
Route::get('/panel/allVideos/',         [adminController::class, 'allVideos'])->name('allVideos');


//ABOUT
Route::get('/panel/about/',             [adminController::class, 'about'])->name('about');
Route::POST('/panel/saveAbout/',        [adminController::class, 'saveAbout'])->name('saveAbout');
Route::POST('/panel/updateAbout/{id}',  [adminController::class, 'updateAbout'])->name('updateAbout');


//SOCIALS
Route::get('/panel/social',                 [socialController::class, 'social'])->name('social');
Route::get('/panel/deleteSocial/{id}',      [socialController::class, 'deleteSocial'])->name('deleteSocial');
Route::post('/panel/saveSocial',            [socialController::class, 'saveSocial'])->name('saveSocial');

//URL::forceScheme('https');
