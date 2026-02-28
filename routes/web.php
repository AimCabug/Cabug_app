<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\ProductController;
use App\Services\ProductService;

// Home Route
Route::get('/', function () {
    // return 'hello woorldoooo';
    return view('welcome', [
        'name' => 'Cabug_app'
    ]);
});

// Service Controller
Route::get('/show-users', [UserController::class, 'show']);

// Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

// Service Providers
Route::get('test-service', function(UserService $userService) {
    return $userService->listUsers();
});

// Service Provider
Route::get('/test-users', [UserController::class, 'index']);

// Service Facade
Route::get('test-facade', function(UserService $userService)
{
    return Response::json($userService->listUsers());
});

/* ============================================================================= */
// Exercise #3
// Routing
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId . " - Comment: " . $comment;
});

Route::get('/post/{id}', function(string $id) {
    return $id;
}) -> where('id', '[0-9]+');

Route::get('/search/{search}', function(string $search) {
    return "you've search for : " . $search;
}) -> where('search', '.*');

// Named Route -> Route Alias
Route::get('/test/route/sample', function() {
    return route('test-route');
}) -> name('test-route');

// Route -> Middleware Group
Route::middleware(['user-middleware']) -> group(function() {

Route::get('route-middleware-group/first', function(Request $request) {
    echo 'first';
    });

    Route::get('route-middleware-group/second', function(Request $request) {
       echo 'second';
    });
});

// Route -> Controller
Route::controller(UserController::class) -> group(function(){
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});

// CSRF
Route::get('token', function() {
    return view('token');
});

Route::post('/token', function(Request $request) {
   return $request -> all();
});

// CONTROLLER

// MIDDLEWARE

Route::get('/users', [UserController::class, 'index']
) -> middleware('user-middleware');


use App\Services\TaskService;

// RESOURCE
Route::resource('products', ProductController::class);

Route::get('/product-list', function (ProductService $productService, TaskService $taskService) {
    $taskService->add('Add to Cart');
    $taskService->add('Checkout');

    $data['products'] = $productService->getList();
    $data['tasks'] = $taskService->getAllTasks();
    return view('product.list', $data);
});