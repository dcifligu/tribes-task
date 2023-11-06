<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\TasksController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return redirect()->route('showLogin');
    });

    //Dashboard routes
    Route::prefix('user')->group(function(){
        Route::get('dashboard/{id}', [UserController::class, 'showUserDashboard'])->name('user.dashboard');
    });

    //All routes regarding task management
    Route::post('tasks', [TasksController::class, 'store'])->name('tasks.store');
    Route::delete('tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/search', 'TasksController@search')->name('tasks.search');
    Route::get('user/dashboard/{id}/viewTask/{taskID}', [UserController::class, 'viewTask'])->name('user.dashboard.viewTask');
    Route::get('user/dashboard/{id}/task/{taskID}', [UserController::class, 'viewTask'])->name('user.dashboard.viewTask');
    Route::get('user/dashboard/{id}/edit/{taskID}', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');


    //Login and registration routes
    Route::prefix('account')->group(function(){
        Route::get('login',[UserController::class, 'showForm'])->name('showLogin');
        Route::post('login',[UserController::class, 'authenticate'])->name('authenticate');
        Route::get('register', [UserController::class, 'showRegistration'])->name('showRegistration');
        Route::post('register', [UserController::class, 'register'])->name('register');
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
    });

