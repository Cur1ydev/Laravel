<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
// use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Product\Dashboard;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Validation\ValidationController;
use App\Http\Controllers\UserController;
use function Termwind\render;

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

Route::get("/", 'App\Http\Controllers\HomeController@index')->name("home")->middleware("checkAdminLogin");

Route::get('/danh-muc/{id}', [HomeController::class, "danhmuc"])->middleware("checkAdminLogin");

// Route::get("/post",function(){

//     return view("form");
// });
// Route::post("/post",function(){
//     return $_POST["username"];
// });
// Route::match(["get","post"],"/post",function(){
//     return $_SERVER["REQUEST_METHOD"];
// });
// Route::any("/post",function(Request $request){
//     $rq= new Request();
//     return $rq;
// });
// Route::get('/home',function(){
//     return view('home');
// });
Route::get('/admin/{slug}-{id?}.html', function ($slug = null, $id = null) {
    $content = "slug là: " . $slug . "<br>";
    $content .= "id là :" . $id;
    return $content;
})->where(
    [
        'slug' => '.+',
        'id' => '[0-9]+'
    ]
)->middleware("checkAdminLogin");
Route::get('/', function () {
    $title = "Học laravel";
    $name = "Lợi";

    return view("test/home", compact('title', 'name')); //import trang home (Giống như include);
    // return render('home.blade')compact('title','name');
    // return "Đây là trang chủ";
})->name("home")->middleware("checkAdminLogin");
Route::middleware("checkAdminLogin")->prefix("admin")->group(function () {
//    Route::get('/', [Dashboard::class, 'index']);
    Route::get('/', [UserController::class, 'index']);
    Route::view("/welcome", "form");
//    Route::get("/", function () {
//        return view("home");
//    })->name("home");
    Route::prefix("product")->middleware("CheckPermission")->group(function () {
        Route::get("/",[UserController::class, 'index']);
        Route::get("/add",[UserController::class, 'addItem']);
        Route::get("/front", function () {
            return "Đây là Trang Người dùng";
        });
    });
});
// Route::get("")
Route::get('/category', [CategoryController::class, 'index'])->name("cate_add");
Route::post('/category', [CategoryController::class, 'index']);
Route::get('/form', [CategoryController::class, 'showPost']);
Route::post('/form', [CategoryController::class, 'showPost']);
Route::get("/show-response", function () {
    // $contentArr=[
    //     "name" => "Laravel",
    //     "content"=>"Khóa Học Lập Trình Laravel"
    // ];
    // return $contentArr;

    // $response= new Response("",201);
    // return $response;
    // dd($response);;
    // dd(response());
    // $content="<h3>Tớ là Lợi xoăn nè</h3>";
    // $content=json_encode([
    //     "item 1",
    //     "item 2",
    //     "item 3"
    // ]);
    // $response= (new Response($content))->header("Content-Type","Application/json");
    // $response = (new Response())->cookie("abc","training php",30);
    // return $response;
    // return view("demo-test");
    $title = "xin chào Lợi";
    $response = response()
        ->view("demo-test", compact("title"), 201)
        ->header("Content-Type", "Application/json")
        ->header("API-KEY", 123456);


    return $response;
});
Route::get("/demo-response2", function (Request $request) {
    //    return $request->cookie('abc');

    // return $request -> cookie('abc');

    // return

});
// Route::get('/demo-response', function () {
//     $contentArr = [
//         "name" => "Laravel",
//         "content" => "Khóa Học Lập Trình Laravel"
//     ];
//     return response()->json($contentArr)->header("Api-Key", 1234);
// });
Route::get('/hello', function () {
    return new Response('Hello, world!', 200);
});
Route::get('/user/{id}', function ($id) {
    $user = User::findOrFail($id);

    return response()->json($user);
});

Route::get('/download/{filename}', function ($filename) {
    $pathToFile = storage_path('app/' . $filename);

    return response()->file($pathToFile);
});
Route::get('/demo-response', function () {
    return view("form");
})->name('demo');

Route::post('/demo-response', function (Request $request) {
    if (!empty($request->username)) {
        // return route('demo'); trả về cả 1 đường dẫn
        return redirect()->route('demo')->with('mess','Validate thành công'); //with sẽ như 1 session và tự mất khi reload
        // return back()->withInput();
    }
    return redirect()->route('demo')->with('mess','Validate không thành công');
});

//response dạng download file
Route::get('/download-img',function (){
    return view('img.downimg');
});
Route::get('/dowload',[HomeController::class,'downloadFile']);
Route::get('/dowload-file',[HomeController::class,'downloadDoc']);

//validation
Route::get('/validation-add',[ValidationController::class,'index']);
Route::post('/validation-add',[ValidationController::class,'addPost'])->name('Postadd');
// Route::get('/validation-add',function(){
//     return view('validation.addvalidation');
// });
// Route::post('/validation-add',function(){
//     // return view('validation.addvalidation');
//     echo 123;
// });

//Làm việc với database
Route::get('/db',[HomeController::class,'indexDataBase']);
//Route::get('/listUser',[UserController::class,'index']);
//Route::prefix('/user')->name('user.')->group(function (){
//    Route::get('/list',[UserController::class,'index']);
//    Route::get('/add',[UserController::class,'addItem'])->name('add');
//});
//Route::get('/add',[UserController::class,'addItem'])->name('add');

Route::prefix("product")->group(function () {
    Route::get("/",[UserController::class, 'index'])->name('product.index');
    Route::post("/",[UserController::class, 'index'])->name('product.index');
    Route::get("/add",[UserController::class, 'addItem'])->name('product.add');
    Route::post('/add',[UserController::class,'addPost'])->name('product.addPost');
    Route::get("/update-{id}",[UserController::class, 'update'])->name('product.update');
    Route::post('/update-{id}',[UserController::class,'updatePost'])->name('product.updatePost');
    Route::get('/Delete-id-{id}',[UserController::class,'deleteItem'])->name('product.delete');

});


