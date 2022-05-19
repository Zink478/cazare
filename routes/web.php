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

    ///////FISIERE
    Route::get('/export', [\App\Http\Controllers\Admin\StudentController::class, 'export'])->name('student.export');
    Route::get('/import', [\App\Http\Controllers\Admin\StudentController::class, 'import'])->name('student.import');
    Route::get('/upload', [\App\Http\Controllers\Admin\FileUploadController::class, 'index'])->name('student.upload');
    Route::post('/fileupload', [\App\Http\Controllers\Admin\StudentController::class, 'importFile'])->name('student.fileupload');
    Route::get('/generatepdf', [\App\Http\Controllers\Admin\PDFController::class, 'index'])->name('student.pdf');
    Route::get('/pdfexport', [\App\Http\Controllers\Admin\PDFController::class, 'export'])->name('student.pdfexport');

    ///////////////////
   Route::get('/camere', [\App\Http\Controllers\Admin\RoomController::class, 'index'])->name('admincamere');
   Route::get('/camere/{id}', [\App\Http\Controllers\Admin\RoomController::class, 'info'])->name('admininfo');
   Route::get('/camere/kickstudent/{IDNP}', [\App\Http\Controllers\Admin\RoomController::class, 'delete'])->name('student.kick');
   Route::get('/camere/movestudent/{IDNP}', [\App\Http\Controllers\Admin\RoomController::class, 'update'])->name('student.move');

   Route::get('/cereri', [\App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('admincereri');

   Route::get('/acceptcerere/{IDNP}', [\App\Http\Controllers\Admin\ApplicationController::class, 'accept'])->name('accept.app');
   Route::get('/declinecerere/{IDNP}', [\App\Http\Controllers\Admin\ApplicationController::class, 'decline'])->name('decline.app');
//   Route::post('/camere/updatestudent/{IDNP}', [\App\Http\Controllers\Admin\RoomController::class, 'update'])->name('record.update');

    Route::get('notificari',[\App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications');
    Route::get('notificari/sendemails', [\App\Http\Controllers\Admin\NotificationController::class, 'emailAll'])->name('email.push');
//    Route::get('/sms', [\App\Http\Controllers\Admin\PhoneController::class, 'index'])->name('sms');
    Route::post('/sms', [\App\Http\Controllers\Admin\PhoneController::class, 'send'])->name('sms.student');

});

Route::group([
    'prefix' => 'profile',
    'middleware' => ['auth']
], function()
{
    Route::get('/', [\App\Http\Controllers\StudentProfileController::class,'index'])->name('profile');
    Route::post('/saveprofile/{user_id}', [\App\Http\Controllers\StudentProfileController::class, 'save'])->name('profile.save');
    Route::post('/updateprofile', [\App\Http\Controllers\StudentProfileController::class, 'update'])->name('profile.update');

});
Route::group([
    'middleware' => ['auth']
], function()
{
    Route::get('/cazare/{roomNumber}', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('application');
    Route::post('/cazare/savecerere', [\App\Http\Controllers\ApplicationController::class, 'save'])->name('application.save');
    Route::get('/cazare/deletecerere/{IDNP}',[\App\Http\Controllers\ApplicationController::class, 'delete'])->name('application.delete');
    Route::get('/get-qr/{IDNP}', [\App\Http\Controllers\QRController::class, 'index'])->name('qr');
    Route::get('/payments', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payments');
    Route::get('/sendinvoice', [\App\Http\Controllers\PaymentController::class, 'send'])->name('payment.send');
    Route::post('/getinvoice', [\App\Http\Controllers\PaymentController::class, 'get'])->name('payment.get');
});
//Route::get('/user/{id}/{name}', function ($id, $name) {
//    return 'ID: '. $id. ' Name:'. $name;
//});


//AAAAAAAAAAAAPPPPPPPPPPPPPPPPIIIIIIIIIIIIIIIIIIIIII

Route::get('/students',[\App\Http\Controllers\API\StudentController::class, 'index']);
Route::get('/students/{idnp}', [\App\Http\Controllers\API\StudentController::class, 'show']);
Route::post('/students', [\App\Http\Controllers\API\StudentController::class, 'store']);
Route::put('/students/{idnp}', [\App\Http\Controllers\API\StudentController::class, 'update']);
Route::delete('/students/{idnp}', [\App\Http\Controllers\API\StudentController::class, 'destroy']);

Route::get('/allrooms', [\App\Http\Controllers\API\RoomController::class, 'index']);
////////////profil

Route::post('/saveavatar/', [\App\Http\Controllers\StudentProfileController::class, 'saveavatar'])->name('save.avatar');


//Route::get('/home123123', [App\Http\Controllers\HomeController::class, 'index'])->name('home123123')->middleware('2fa');
//Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
//Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
//Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

Auth::routes();

