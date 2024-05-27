<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Properties\PropertyController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Page\PageController;
use Illuminate\Http\Request;
use App\Http\Services\ImageMain\ImageMainService;
use Carbon\Carbon;
use App\Models\User;

//Users routes 
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('signup', [UserController::class, 'sign_up']);
Route::post('signin', [UserController::class, 'sign_in']);
Route::get('logout', [UserController::class, 'logout']);
//Pages routes
Route::get('/', [PageController::class, 'index']);
Route::get('/danh-sach', [PageController::class, 'listProperty']);
Route::get('/chi-tiet/{property}-{slug}.html', [PageController::class, 'propertyDetail']);
Route::get('/propertiesAPI', [PageController::class, 'propertiesAPI']);
Route::get('/propertyAPI/{property}', [PageController::class, 'propertyAPI']);
Route::post('/addComment', [PageController::class, 'addComment']);
Route::get('/showComments/{property}', [PageController::class, 'showComments']);
//Admin routes
Route::middleware(['auth'])->group(function(){
    //User Routes
    Route::get('user-info', [UserController::class, 'user_info']);
    Route::post('update-info', [UserController::class, 'update_info']);
    Route::post('change-password', [UserController::class, 'change_password']);
    //Property Routes
    Route::prefix('properties')->group(function (){
        Route::get('add', [PropertyController::class, 'add']);
        Route::post('add', [PropertyController::class, 'create']);
        Route::get('posted', [PropertyController::class, 'posted']);
    });
    //Admin routes
    Route::prefix('admin')->group(function(){
        //Property Administration
        Route::prefix('properties')->group(function(){
            Route::get('show', [PropertyController::class, 'show']);
            Route::get('edit/{property}', [PropertyController::class, 'edit']);
            Route::post('edit/{property}', [PropertyController::class, 'update']);
            Route::DELETE('delete', [PropertyController::class, 'delete']);
        });
        //User Administration
        Route::prefix('users')->group(function(){
            Route::get('show', [UserController::class, 'show']);
            Route::DELETE('delete', [UserController::class, 'delete']);
        });
        Route::get('dashboard', function(){
            return view('admin.dashboard',[
                'title' => 'Dashboard Admin'
            ]);
        })->name('dashboard');
        
    });
});
Route::post('upload', function(Request $request){
    $imageMainService = new ImageMainService();

    $imageUrl = $imageMainService->uploads($request->file('file'));

    if($imageUrl){
        return response()->json([
            'path' => $imageUrl,
            'pathUrl' => url($imageUrl)
        ]);
    }else {
        return response()->json([
            'error' => 'Có lỗi khi upload hình ảnh!'
        ], 500);
    }
});

Route::get('testthoi' ,function(){
    return view('test');
});

Route::get('trave', function(){
    $users = User::all();
    return response()->json($users);
});