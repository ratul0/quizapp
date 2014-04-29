<?php


/*for creating a User*/


/*Route::get('/',['as'=>'login', function()
{
	$user = ['email'=>'ratulcse27@gmail.com','password'=>Hash::make('1')];

	User::create($user);
}]);
*/

/*for creating a User*/

Route::get('/',['as'=>'login','uses'=>'UsersController@getLogin']);
Route::get('login',['as'=>'login','uses'=>'UsersController@getLogin']);
Route::post('login','UsersController@postLogin');
Route::get('logout',['as'=>'logout', 'uses'=>'UsersController@getLogout']);



Route::group(array('before' => 'auth'), function()
{

	Route::get('home',['as'=>'home','uses'=>'UsersController@index']);
	Route::get('adminchange',['as'=>'adminchange','uses'=>'UsersController@edit']);
	Route::post('adminchange','UsersController@update');
	
	Route::resource('subjects',"SubjectsController");
	Route::resource('subjects.topics',"TopicsController");
	
	Route::resource('subjects.topics.questions',"QuestionsController");

	Route::get('subjects/delete/{id}', 'SubjectsController@deleteSubject');
	Route::get('subjects/{subjectid}/topics/delete/{topicid}', 'TopicsController@deleteTopic');
	Route::get('subjects/{subjectid}/topics/{topicid}/questions/delete/{questionid}', 'QuestionsController@deleteQuestion');


});



Route::get('api/subjects',function(){
	return DB::table('subjects')->get();
});
Route::get('api/topics',function(){
	return DB::table('topics')->get();
});
Route::get('api/questions',function(){
	return DB::table('questions')->get();
});

