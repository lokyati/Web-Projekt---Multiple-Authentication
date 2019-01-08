 <?php
    Route::view('/', 'welcome');
    Auth::routes();

//Admin Authentication Routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\LoginController@showAdminLoginForm');
    Route::post('/login', 'Auth\LoginController@adminLogin');
    Route::get('/register', 'Auth\RegisterController@showAdminRegisterForm');
    Route::post('/register', 'Auth\RegisterController@createAdmin');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

//Writer Authentication Routes
Route::prefix('writer')->group(function() {
    Route::get('/login', 'Auth\LoginController@showWriterLoginForm');
    Route::post('/login', 'Auth\LoginController@writerLogin');
    Route::get('/register', 'Auth\RegisterController@showWriterRegisterForm');
    Route::post('/register', 'Auth\RegisterController@createWriter');
    Route::get('/', 'WriterController@index')->name('writer.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/home', 'home')->middleware('auth');
