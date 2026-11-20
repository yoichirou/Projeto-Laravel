<?php


use App\Http\Controllers\ChristmasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UtilController::class, 'loadWelcome'])->name('welcome');

Route::get('/hello/{message}', function ($message) {
    return '<h1>Hello '.$message.'</h1>';
});


//rota de homepage
Route::get('/home', [UtilController::class, 'loadHomepage'])->name('home');
// ***************************************************************************************************************

//rota que mostra all users
Route::get('/users', [UserController::class, 'allUsers'])->name('users.all');

//rota de add user
Route::get('/adduser', [UserController::class, 'addUsers'])->name('users.add');

//rota de apagar users
Route::get('/delete-users/{id}', [UserController::class, 'deleteUsers'])->name('users.delete');

//rota de editar users

Route::get('/edit-users/{id}', [UserController::class, 'editUsers'])->name('users.edit')->middleware('auth');

//rota de store users
Route::post('/store-user',[UserController::class, 'storeUser'])->name('users.store');

//rota de put users
Route::put('/update-user',[UserController::class, 'updateUser'])->name('users.update');

// ***************************************************************************************************************

//rota de Alltaks
Route::get('/tasks', [TaskController::class, 'tasks'])->name('tasks.all');

//rota de add tarefa
Route::get('/add-task', [TaskController::class, 'addTasks'])->name('tasks.add');

//rota de apagar Alltasks
Route::get('/delete-tasks/{id}', [TaskController::class, 'deleteTasks'])->name('tasks.delete');

//rota de editar Alltasks
Route::get('/edit-tasks/{id}', [TaskController::class, 'editTasks'])->name('tasks.edit');

//rota de store tasks
Route::post('/store-task',[TaskController::class, 'storetask'])->name('tasks.store');

// ***************************************************************************************************************

//rota de Todas as Prendas
Route::get('/chgifts', [ChristmasController::class, 'gifts'])->name('gifts.all');

//rota de add tarefa
Route::get('/add-chgifts', [ChristmasController::class, 'addgifts'])->name('gifts.add');

//rota de apagar Alltasks
Route::get('/delete-chgifts/{id}', [ChristmasController::class, 'deletegifts'])->name('gifts.delete');

//rota de editar Alltasks
Route::get('/edit-chgift/{id}', [ChristmasController::class, 'editgifts'])->name('gifts.edit');

//rota de store tasks
Route::post('/store-chgift',[ChristmasController::class, 'storegifts'])->name('gifts.store');

//rota de put users
Route::put('/update-chgift',[ChristmasController::class, 'updategifts'])->name('gifts.update');

// ***************************************************************************************************************

//rota home dashboard
Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard.all')->middleware('auth');


// ***************************************************************************************************************
//rota fallback
Route::fallback(function () {
    return view('utils.fallback');
});
