<?php


use App\Http\Middleware\CheckLogin;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLoginUser;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarStudent;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MarkResitController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\AverageMarkController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\UserAuthenticateController;

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

//admin
Route::get('/admin/login', [AuthenticateController::class, 'loginAdmin'])->name('login-admin');
Route::post('/login-process-admin', [AuthenticateController::class, 'loginProcessAdmin'])->name('loginProcessAdmin');
Route::get('/admin/logout', [AuthenticateController::class, 'logoutAdmin'])->name('logout-admin');

//tạo middleware để  check xem ng dùng có đăng nhập hay không.Nếu có thì cho vào, không thì mời đăng nhập
Route::middleware([CheckLogin::class])->group(function () {
    //dashboard
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard-admin');
    //major
    Route::resource('major', MajorController::class);
    //course
    Route::resource('course', CourseController::class);
    //semester
    Route::resource('semester', SemesterController::class);
    //subject
    Route::resource('subject', SubjectController::class);
    //grade
    Route::resource('grade', GradeController::class);
    //student
    Route::resource('student', StudentController::class);
    //admin
    Route::resource('admin',AdminController::class);

    //profile
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/profile/edit-profile/{id}',[ProfileController::class,'editProfile'])->name('edit-profile');
    Route::put('/profile/edit-profile-process/{id}',[ProfileController::class,'editProfileProcess'])->name('edit-profile-process');
    //change-password
    Route::get('/profile/change-password',[ProfileController::class,'changePassword'])->name('change-password');
    Route::post('/profile/change-password-process/{id}',[ProfileController::class,'changePasswordProcess'])->name('change-password-process');

    Route::get('statistic/list-mark',[StatisticController::class,'indexStudent'])->name('list-mark');
    Route::post('statistic/export-student-mark',[StatisticController::class, 'export'])->name('export-student-mark');
    Route::get('statistic/list-mark-max',[StatisticController::class,'markMax'])->name('list-mark-max');
    Route::get('statistic/list-student-resit',[StatisticController::class, 'listStudentResit'])->name('list-student-resit');
    Route::post('statistic/export-student-resit',[StatisticController::class, 'exportStudentResit'])->name('export-student-resit');

    // Route::get('average-mark/list-detail-mark',[AverageMarkController::class, 'markAverage'])->name('list-detail-mark');

    //mark
    Route::resource('mark', MarkController::class);
    //mark-resit
    Route::resource('mark-resit',MarkResitController::class);
    //mark-average
    // Route::resource('list-detail-mark', AverageMarkController::class);
    Route::resource('mark-average',AverageMarkController::class);
    // Route::get('average-mark/list-average-mark', [AverageMarkController::class,'MarkAverage'])->name('list-average-mark');
    // Route::post('/export-csv',[StudentController::class,'export_csv']);
    Route::post('/import-csv',[StudentController::class,'import_csv'])->name('student-import');
});

 //user
Route::get('/user/login', [UserAuthenticateController::class, 'loginUser'])->name('login-student');
Route::post('/user/login-process', [UserAuthenticateController::class, 'loginProcessUser'])->name('loginProcessStudent');
Route::get('/user/logout', [UserAuthenticateController::class, 'logoutUser'])->name('logout-student');

Route::middleware([CheckLoginUser::class])->group(function(){
    Route::get('user/home',[UserController::class,'dash'])->name('home-student');
    Route::get('/user/mark/{id}', [UserController::class, 'indexMark'])->name('mark-student');
    Route::get('/user/profile/{id}',[UserController::class,'index'])->name('profile-student');
    Route::put('/user/edit-profile',[UserController::class,'editProfile'])->name('edit-profile');
    Route::get('/user/password/{id}',[UserController::class,'changePassword'])->name('password');
    Route::post('/user/change-process/{id}',[UserController::class,'changePasswordProcess'])->name('change-process');

});


