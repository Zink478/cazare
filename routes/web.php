<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');
Route::get('/home', [\App\Http\Controllers\MainController::class, 'home'])->name('home');

//Route::post('/check', [\App\Http\Controllers\MainController::class, 'check']);
Route::get('/cazare', [\App\Http\Controllers\CazareController::class, 'cazare' ])->name('cazare');
Route::get('/panou_informativ', [\App\Http\Controllers\PanouInformativController::class, 'panou_informativ'])->name('panou_informativ');
//Route::get('/about', [\App\Http\Controllers\MainController::class, 'about']);
Route::get('/contacts', [\App\Http\Controllers\ContactsController::class, 'contacts'])->name('contacts');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function() {
  Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('adminhome');
  Route::get('/cazare', [\App\Http\Controllers\Admin\CazareController::class, 'index'])->name('admincazare');
    //Route::get('/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'delete']);
    Route::post('/student', [\App\Http\Controllers\Admin\StudentController::class, 'store'])->name('student.store');
//    Route::get('/delete/{id}', [\App\Http\Controllers\Admin\StudentController::class, 'delete'])->name('student.delete');
    Route::get('/edit/{student}', [\App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update/{student}', [\App\Http\Controllers\Admin\StudentController::class, 'update'])->name('student.update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('student.delete');

    Route::get('/cazare/{id}', [\App\Http\Controllers\Admin\RecordController::class, 'delete'])->name('record.delete');
    Route::post('/cazare/store', [\App\Http\Controllers\Admin\RecordController::class, 'store'])->name('record.store');
    Route::get('/export', [\App\Http\Controllers\Admin\StudentController::class, 'export'])->name('student.export');
    Route::get('/import', [\App\Http\Controllers\Admin\StudentController::class, 'import'])->name('student.import');
    Route::get('/upload', [\App\Http\Controllers\Admin\FileUploadController::class, 'index'])->name('student.upload');
    Route::post('/fileupload', [\App\Http\Controllers\Admin\StudentController::class, 'importFile'])->name('student.fileupload');

   Route::get('/camere', [\App\Http\Controllers\Admin\RoomController::class, 'index'])->name('admincamere');
   Route::get('/camere/{id}', [\App\Http\Controllers\Admin\RoomController::class, 'info'])->name('admininfo');

});

Route::group([
    'prefix' => 'profile',
    'middleware' => ['auth']
], function()
{
    Route::get('/', [\App\Http\Controllers\StudentProfileController::class,'index'])->name('profile');
    Route::post('/saveprofile', [\App\Http\Controllers\StudentProfileController::class, 'save'])->name('profile.save');
    Route::post('/updateprofile', [\App\Http\Controllers\StudentProfileController::class, 'update'])->name('profile.update');

});


//Route::get('/user/{id}/{name}', function ($id, $name) {
//    return 'ID: '. $id. ' Name:'. $name;
//});


Auth::routes();

