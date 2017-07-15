<?php
use App\AccountInfo;
use Illuminate\Http\Request;
use App\LeavesModel;
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

Route::get('/', function () {
  // return view('/home');
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group( ['middleware' => ['auth']], function() {
  Route::resource('roles', 'RoleController');
  Route::resource('posts', 'PostController');

  Route::get('/accounts','AccountInfoController@index')->name('accounts.index');
  Route::get('/accounts/add','AccountInfoController@create')->name('accounts.create');
  Route::post('/accounts/add','AccountInfoController@store')->name('account.store');
  Route::get('/accounts/{user}/edit','AccountInfoController@edit')->name('accounts.edit');
  Route::get('/accounts/{accounts}',array('as' => 'accounts.update', 'uses' => 'AccountInfoController@update'));
  Route::delete('/accounts/{user}','AccountInfoController@destroy')->name('accounts.destroy');
  Route::get('/accounts/{accounts}/profile', 'AccountInfoController@show')->name('accounts.show');
  Route::get('/accounts/{accounts}/check', 'AccountInfoController@checkAttendance')->name('accounts.check');
  Route::post('/accounts/{accounts}/check', 'AccountInfoController@submitAttendance')->name('accounts.submitAttendance');
  Route::post('/profileAV/{accounts}', 'AccountInfoController@update_avatar')->name('accounts.update_avatar');


  Route::get('/department','DepartmentController@index')->name('department.index');
  Route::get('/department/add','DepartmentController@create')->name('department.create');
  Route::post('/department/add','DepartmentController@store')->name('department.store');
  Route::get('/department/{department}/edit','DepartmentController@edit')->name('department.edit');
  Route::get('/department/{department}',array('as' => 'department.update', 'uses' => 'DepartmentController@update'));
  Route::delete('/department/{department}','DepartmentController@destroy')->name('department.destroy');

  Route::get('/designation','DesignationController@index')->name('designation.index');
  Route::get('/designation/add','DesignationController@create')->name('designation.create');
  Route::post('/designation/add','DesignationController@store')->name('designation.store');
  Route::get('/designation/{designation}/edit','DesignationController@edit')->name('designation.edit');
  Route::get('/designation/{designation}',array('as' => 'designation.update', 'uses' => 'DesignationController@update'));
  Route::delete('/designation/{designation}','DesignationController@destroy')->name('designation.destroy');

  Route::get('/emdesignation','EmDesignationController@index')->name('emdesignation.index');
  Route::get('/emdesignation/add', array('as'=>'user','uses'=>'EmDesignationController@create'));
  Route::get('/emdesignation/autocomplete',array('as' => 'autocomplete','uses'=>'EmDesignationController@autocomplete'));
  // Route::get('/emdesignation/add','EmDesignationController@create')->name('emdesignation.create');
  Route::post('/emdesignation/add','EmDesignationController@store')->name('emdesignation.store');
  Route::get('/emdesignation/{emdesignation}/edit','EmDesignationController@edit')->name('emdesignation.edit');
  Route::get('/emdesignation/{emdesignation}',array('as' => 'emdesignation.update', 'uses' => 'EmDesignationController@update'));
  Route::delete('/emdesignation/{emdesignation}','EmDesignationController@destroy')->name('emdesignation.destroy');


  Route::get('/bankaccount','BankaccountController@index')->name('bankaccount.index');
  Route::get('/bankaccount/add', array('as'=>'bankaccount.create','uses'=>'BankaccountController@create'));
  Route::post('/bankaccount/add','BankaccountController@store')->name('bankaccount.store');
  Route::get('/bankaccount/{bankaccount}/edit','BankaccountController@edit')->name('bankaccount.edit');
  Route::get('/bankaccount/{bankaccount}',array('as' => 'bankaccount.update', 'uses' => 'BankaccountController@update'));
  Route::delete('/bankaccount/{bankaccount}','BankaccountController@destroy')->name('bankaccount.destroy');

  Route::get('/events', 'EventController@index')->name('events.index');
  Route::get('/events/add', 'EventController@create')->name('events.create');
  Route::post('/events/add', 'EventController@store')->name('events.store');
  Route::get('/events/{event}/edit', 'EventController@edit')->name('events.edit');
  Route::get('/events/{events}', array('as' => 'events.update', 'uses' => 'EventController@update'));
  Route::delete('/events/{event}', 'EventController@destroy')->name('events.destroy');

  Route::get('/holidays', 'HolidaysController@index')->name('holidays.index');
  Route::get('/holidays/add', 'HolidaysController@create')->name('holidays.create');
  Route::post('/holidays/add', 'HolidaysController@store')->name('holidays.store');
  Route::get('/holidays/{holiday}/edit', 'HolidaysController@edit')->name('holidays.edit');
  Route::get('/holidays/{holidays}', array('as' => 'holidays.update', 'uses' => 'HolidaysController@update'));
  Route::delete('/holidays/{holiday}', 'HolidaysController@destroy')->name('holidays.destroy');

  Route::get('/awards', 'AwardsController@index')->name('awards.index');
  Route::get('/awards/add', array('as'=>'awards.create','uses'=>'AwardsController@create'));
  Route::post('/awards/add', 'AwardsController@store')->name('awards.store');
  Route::get('/awards/{award}/edit', 'AwardsController@edit')->name('awards.edit');
  Route::get('/awards/{awards}', array('as' => 'awards.update', 'uses' => 'AwardsController@update'));
  Route::delete('/awards/{award}', 'AwardsController@destroy')->name('awards.destroy');
  Route::get('/awards/{accounts}/usercreateaward', 'AwardsController@usercreateaward')->name('awards.usercreateaward');
  Route::post('/awards/{accounts}', array('as' => 'awards.storeaward', 'uses' => 'AwardsController@storeaward'));

  Route::get('/pay', 'PayController@index')->name('pay.index');
  Route::get('/pay/add', array('as'=>'pay.create','uses'=>'PayController@create'));
  Route::post('/pay/add', 'PayController@store')->name('pay.store');
  Route::get('/pay/{award}/edit', 'PayController@edit')->name('pay.edit');
  Route::get('/pay/{awards}', array('as' => 'pay.update', 'uses' => 'PayController@update'));
  Route::delete('/pay/{award}', 'PayController@destroy')->name('pay.destroy');
  Route::get('/pay/{accounts}/usercreatepay', 'PayController@usercreatepay')->name('pay.usercreatepay');
  Route::post('/pay/{accounts}', array('as' => 'pay.storepay', 'uses' => 'PayController@storepay'));

  Route::get('/trainingprogram', 'TrainingprogramController@index')->name('trainingprogram.index');
  Route::get('/trainingprogram/add', array('as'=>'trainingprogram.create','uses'=>'TrainingprogramController@create'));
  Route::post('/trainingprogram/add', 'TrainingprogramController@store')->name('trainingprogram.store');
  Route::get('/trainingprogram/{trainingprograms}/edit', 'TrainingprogramController@edit')->name('trainingprogram.edit');
  Route::get('/trainingprogram/{trainingprogram}', array('as' => 'trainingprogram.update', 'uses' => 'TrainingprogramController@update'));
  Route::delete('/trainingprogram/{trainingprograms}', 'TrainingprogramController@destroy')->name('trainingprogram.destroy');

  Route::get('/training', 'TrainingController@index')->name('training.index');
  Route::get('/training/add', array('as'=>'training.create','uses'=>'TrainingController@create'));
  Route::post('/training/add', 'TrainingController@store')->name('training.store');
  Route::get('/training/{training}/edit', 'TrainingController@edit')->name('training.edit');
  Route::get('/training/{training}', array('as' => 'training.update', 'uses' => 'TrainingController@update'));
  Route::delete('/training/{training}', 'TrainingController@destroy')->name('training.destroy');
  Route::get('/training/{accounts}/usertraining', 'TrainingController@usertraining')->name('training.usertraining');
  Route::post('/training/{accounts}', array('as' => 'training.storetraining', 'uses' => 'TrainingController@storetraining'));

  Route::get('/leavestype', 'LeavestypeController@index')->name('leavestype.index');
  Route::get('/leavestype/add', 'LeavestypeController@create')->name('leavestype.create');
  Route::post('/leavestype/add', 'LeavestypeController@store')->name('leavestype.store');
  Route::get('/leavestype/{leavestypes}/edit', 'LeavestypeController@edit')->name('leavestype.edit');
  Route::get('/leavestype/{leavestypes}', array('as' => 'leavestype.update', 'uses' => 'LeavestypeController@update'));
  Route::delete('/leavestype/{leavestypes}', 'LeavestypeController@destroy')->name('leavestype.destroy');

  Route::get('/nationality', 'NationalityController@index')->name('nationality.index');
  Route::get('/nationality/add', 'NationalityController@create')->name('nationality.create');
  Route::post('/nationality/add', 'NationalityController@store')->name('nationality.store');
  Route::get('/nationality/{nationalitys}/edit', 'NationalityController@edit')->name('nationality.edit');
  Route::get('/nationality/{nationalitys}', array('as' => 'nationality.update', 'uses' => 'NationalityController@update'));
  Route::delete('/nationality/{nationalitys}', 'NationalityController@destroy')->name('nationality.destroy');

  Route::get('/leaves', 'LeavesController@index')->name('leaves.index');
  Route::get('/leaves/add', 'LeavesController@create')->name('leaves.create');
  Route::post('/leaves/add', 'LeavesController@store')->name('leaves.store');
  Route::get('/leaves/{leaves}/edit', 'LeavesController@edit')->name('leaves.edit');
  Route::get('/leaves/{leaves}', array('as' => 'leaves.update', 'uses' => 'LeavesController@update'));
  Route::delete('/leaves/{leaves}', 'LeavesController@destroy')->name('leaves.destroy');
  Route::get('/leaves/{accounts}/userleave', 'LeavesController@userleave')->name('leaves.userleave');
  Route::post('/leaves/{accounts}', array('as' => 'leaves.storeleave', 'uses' => 'LeavesController@storeleave'));
  Route::get('/leaves/{leaves}/show', 'LeavesController@show')->name('leaves.show');

  Route::get('/cutoff', 'CutoffController@index')->name('cutoff.index');
  Route::get('/cutoff/add', 'CutoffController@create')->name('cutoff.create');
  Route::post('/cutoff/add', 'CutoffController@store')->name('cutoff.store');
  Route::get('/cutoff/{cutoffs}/edit', 'CutoffController@edit')->name('cutoff.edit');
  Route::get('/cutoff/{cutoffs}', array('as' => 'cutoff.update', 'uses' => 'CutoffController@update'));
  Route::delete('/cutoff/{cutoffs}', 'CutoffController@destroy')->name('cutoff.destroy');

  Route::get('/attendance', 'AttendanceController@index')->name('attendance.index');
  Route::get('/attendance/add', 'AttendanceController@create')->name('attendance.create');
  Route::post('/attendance/add', 'AttendanceController@store')->name('attendance.store');
  Route::get('/attendance/{attendance}/edit', 'AttendanceController@edit')->name('attendance.edit');
  Route::get('/attendance/{attendance}', array('as' => 'attendance.update', 'uses' => 'AttendanceController@update'));
  Route::delete('/attendance/{attendance}', 'AttendanceController@destroy')->name('attendance.destroy');

  Route::get('/absences', 'AbsencesController@index')->name('absences.index');
  Route::get('/absences/add', 'AbsencesController@create')->name('absences.create');
  Route::post('/absences/add', 'AbsencesController@store')->name('absences.store');
  Route::get('/absences/{absences}/edit', 'AbsencesController@edit')->name('absences.edit');
  Route::get('/absences/{absences}', array('as' => 'absences.update', 'uses' => 'AbsencesController@update'));
  Route::delete('/absences/{absences}', 'AbsencesController@destroy')->name('absences.destroy');
  Route::get('/absences/{accounts}/usercreateabsences', 'AbsencesController@usercreateabsences')->name('absences.usercreateabsences');
  Route::post('/absences/{accounts}', array('as' => 'absences.storeabsences', 'uses' => 'AbsencesController@storeabsences'));

  Route::get('/checkAttendance/{accounts}/check', 'CheckAttendanceController@checkAttendance')->name('checkAttendance.check');
  Route::get('/checkAttendance/{accounts}', array('as' => 'checkAttendance.submitAttendance', 'uses' => 'CheckAttendanceController@submitAttendance'));

  Route::get('/export/{accounts}', 'CheckAttendanceController@exportExcel')->name('export');

});

  // Route::get('/leaves/{leaves}/show', function($id){
  // $leaves = LeavesModel::find($id);
  // $pdf = PDF::loadView('leaves.show', ['leaves' => $leaves]);
  // return $pdf->download('doc.pdf');
  // })->name('leaves.show');

Route::get('daterange', 'API\DaterangeController@dateRange');
Route::get('select', 'API\DaterangeController@select');
////////////////////////////////////////////////////


// Route::resource('accounts', 'AccountInfoController') ;
