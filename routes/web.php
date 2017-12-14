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

#Homepage
Route::get('/', 'WelcomeController@index');


#Add a Job
Route::get('/job/create', 'JobController@create');
Route::post('/jobs', 'JobController@store');

#Add an Employee 
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employees', 'EmployeeController@store');

# Edit a job
Route::get('/job/{id}/edit', 'JobController@edit');
Route::put('/job/{id}', 'JobController@update');

#Edit an Employee
Route::get('/employee/{id}/edit', 'EmployeeController@edit');
Route::put('/employee/{id}', 'EmployeeController@update');

# Delete a book
Route::get('/job/{id}/delete', 'JobController@delete');
Route::delete('/job/{id}', 'JobController@destroy');

# Delete an Employee
Route::get('/employee/{id}/delete', 'EmployeeController@delete');
Route::delete('/employee/{id}', 'EmployeeController@destroy');

#Add an Employee to a Job
Route::get('/employee/{id}/add', 'EmployeeController@add');
Route::put('/job/{id}/add', 'JobController@attach');

#Remove an Employee from a Job
Route::get('/employee/{id}/{lastName}/{firstName}/remove', 'JobController@remove');
Route::put('job/{id}/employees', 'JobController@detach');


#View all Jobs
Route::get('/jobs', 'JobController@index');

#Sort Jobs and Employees
Route::get('/sort/{sortterm}', 'JobController@sort');
Route::get('/sortEmp/{sortterm}', 'EmployeeController@sort');

#View Sign-Up Sheet
Route::get('/job/{id}/employees', 'JobController@signUp');

#View all Employees
Route::get('/employees', 'EmployeeController@index');


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});