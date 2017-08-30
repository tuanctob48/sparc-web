<?php
Route::get('', 'PagesController@page_home');
Route::get('about', 'PagesController@page_about');
Route::get('home', 'PagesController@page_home');
Route::get('login', 'PagesController@page_login');
Route::post('login', 'PagesController@login')->name('login');
Route::get('logout', 'PagesController@page_logout');
Route::get('register', 'PagesController@page_register');
Route::get('importdata', 'PagesController@page_importdata');
Route::get('importfile', 'PagesController@postForm');
Route::post('postArticle', 'PagesController@page_postArticle');
Route::post('uploadFile', 'PagesController@page_uploadfile');
Route::group(['prefix' => 'report'], function () {
    Route::get('', 'PagesController@page_report');
    // Route::get('/viewpost/{id}', 'PagesController@page_viewpost');
    Route::get('/viewpost/{id}', [
        'uses'=>'PagesController@page_viewpost',
        'as'=>'viewpost'
    ]);
});
// Route::group(['prefix' => 'news'], function () {
//     Route::get('', 'PagesController@page_news');
//     // Route::get('/viewpost/{id}', 'PagesController@page_viewpost');
//     Route::get('/viewpost/{id}', [
//         'uses'=>'PagesController@page_viewpost',
//         'as'=>'viewpost'
//     ]);
// });

Route::get('/fileairmap/{req}/{res}/{next}', 'PagesController@page_file');
Route::get('/filewater/{req}/{res}/{next}', 'PagesController@page_file');
Route::get('doProject', 'PagesController@doProject');

// Develop
Route::get('generalCode', 'PagesController@generalCode');
Route::get('awards', 'PagesController@awards');
Route::get('members', 'PagesController@members');
Route::get('project', 'PagesController@project');
Route::get('recruit', 'PagesController@recruit');
Route::get('news', 'PagesController@news');
Route::get('postForm', 'PagesController@postForm');
Route::post('postFile', ['as'=>'postFile','uses'=>'PagesController@postFile']);

//Study Route
Route::get('study', 'StudyController@page_study');
Route::get('artificial_intelligent', 'StudyController@page_artificial_intelligent');
Route::get('references', 'StudyController@page_references');
Route::get('mechanic_techique', 'StudyController@page_mechanic_techique');
Route::get('programing_techique', 'StudyController@page_programing_techique');
Route::get('electronic_techique', 'StudyController@page_electronic_techique');
Route::get('softskill', 'StudyController@page_softskill');


//Information Route
Route::get('infomation', 'InfomationController@page_infomation');

//Communicate with Water Quality
Route::post('/postInfoNode/{node_id}/{code}', 'WaterQualityController@page_postInfoNode');
Route::post('postDataNode', 'IoTSystem@HandlePostRequest');
Route::get('postDataNode', 'IoTSystem@TestPostRequest');
// Route::get('database',function(){
//     Schema::create('documents',function($table){
//         $table->increments('id');
//         $table->string('name',200);
//         $table->string('describe',300);
//         $table->string('link',200);
//     });
//     echo "Đã tạo xong bảng";
// });
