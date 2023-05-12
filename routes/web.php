<?php
Auth::routes();

Route::get('/', 'PageController@index');

// Leads
Route::get('/leads', 'LeadController@index');
Route::any('/leads/add', 'LeadController@lead_add');
Route::any('/leads/delete/{lead}', 'LeadController@lead_delete');
Route::any('/leads/assessment', 'LeadController@assessment');
Route::any('/leads/calculator', 'LeadController@calculator');
Route::get('/leads/{lead}', 'LeadController@lead')->middleware('can:access-lead,lead');
Route::post('/leads/{lead}/mark', 'LeadController@mark');
Route::post('/leads/{lead}/allocations', 'LeadController@allocations');
Route::any('/leads/{lead}/assessment', 'LeadController@assessment');
Route::any('/leads/{lead}/saps', 'LeadController@saps');
Route::any('/leads/{lead}/orders', 'LeadController@orders');

// Checks
Route::any('/assessments', 'AssessmentController@index');
Route::any('/assessments/add', 'AssessmentController@add');
Route::any('/assessments/solar-pv/{assessment}', 'AssessmentController@solar_pv');
Route::any('/assessments/hybrid-boiler/{assessment}', 'AssessmentController@hybrid_boiler');

// SAPs
Route::get('/saps', 'SapController@index');
Route::any('/saps/add', 'SapController@add');
Route::any('/saps/{sap}', 'SapController@show');
Route::any('/saps/{sap}/property', 'SapController@property');
Route::any('/saps/{sap}/system', 'SapController@system');
Route::any('/saps/{sap}/cash-flow', 'SapController@cash_flow');
Route::any('/saps/{sap}/summary', 'SapController@summary');
Route::any('/saps/{sap}/cancel/', 'SapController@cancel');

// Orders
Route::get('/orders', 'OrderController@index');
Route::post('/orders/add', 'OrderController@add');
Route::any('/orders/{order}', 'OrderController@show');
Route::get('/orders/{order}/pdf', 'OrderController@pdf');
Route::any('/orders/{order}/finance', 'OrderController@finance');
Route::any('/orders/{order}/confirmation', 'OrderController@confirmation');
Route::post('/orders/{order}/sign', 'OrderController@sign');

// Surveys
Route::get('/surveys', 'SurveyController@index');

// Installs
Route::get('/installations', 'InstallationController@index');

// Users
Route::any('/users', 'UserController@users');
Route::any('/users/add', 'UserController@users_add');
Route::any('/users/roles', 'UserController@roles');
Route::any('/users/teams', 'UserController@teams');
Route::any('/users/{user}', 'UserController@user');

// Other
Route::get('/logs', 'PageController@logs');
Route::get('/links', 'PageController@links');
Route::get('logout', 'Auth\LoginController@logout');
Route::any('/settings', 'PageController@settings');

// New lead
Route::post('/public/add', 'PublicController@add');
Route::post('/public/legacy/add', 'PublicController@legacy_add');

// APIs
Route::any('/api/yield', 'ApiController@array_yield');
