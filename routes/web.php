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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/go', function (){
    return view('layouts.go');
});

Route::group(['prefix' => 'user', 'middlewhere' => 'auth'], function () {
    // Materals
    Route::get('/materals/add', 'MateralController@create')->name('materals.add');
    Route::post('/materals/store', 'MateralController@store')->name('materals.store');

    Route::get('/materals', 'MateralController@index')->name('materals');

    Route::get('/materals/edit/{id}', 'MateralController@edit')->name('materals.edit');
    Route::post('/materals/update/{id}', 'MateralController@update')->name('materals.update');

    Route::get('/materals/delete/{id}', 'MateralController@destroy')->name('materals.delete');

    Route::get('/materals/trashed', 'MateralController@trashed')->name('materals.trashed');
    Route::get('/materals/hdelete/{id}', 'MateralController@hdelete')->name('materals.hdelete');
    Route::get('/materals/restore/{id}', 'MateralController@restore')->name('materals.restore');

    // Products
    Route::get('/products', 'ProductController@index')->name('products');
    Route::post('/products', 'ProductController@store')->name('products');

    Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
    Route::post('/products/update/{id}', 'ProductController@update')->name('products.update');
    
    Route::get('/products/delete/{id}', 'ProductController@destroy')->name('products.delete');

     // Tags
     Route::get('/tags', 'TagController@index')->name('tags');

     Route::get('/tag/add', 'TagController@create')->name('tag.add');
     Route::post('/tag/store', 'TagController@store')->name('tag.store');
  
     Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
     Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
 
     Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
});



 // Ticket
 Route::get('/tickets/add', 'TicketController@create')->name('tickets.add');
 Route::post('/tickets/store', 'TicketController@store')->name('tickets.store');
 
 Route::get('/tickets', 'TicketController@index')->name('tickets');

 Route::get('/tickets/edit/{id}', 'TicketController@edit')->name('tickets.edit');
 Route::post('/tickets/update/{id}', 'TicketController@update')->name('tickets.update');

 Route::get('/tickets/delete/{id}', 'TicketController@destroy')->name('tickets.delete');

// Route::get('/tickets/search',function() {
//     $arr = ['name','age'];
//     $tickets = App\Ticket::where('name','like','%' . request('search') . '%')
//                        ->orWhere('age','like', '%' . request('search') . '%')
//     ->get();
//     return view('tickets.search',compact('tickets'));
// });

// Route::get('/tickets/search',function() {
//     $tickets = App\Ticket::where('name','like','%'. request('search') . '%')
//                          ->orWhere(function($query){$query->where('age', '>' , 40);})->get();
//     return view('tickets.search',compact('tickets'));
// });

 // Xray
 Route::get('/xrays/add', 'XrayController@create')->name('xrays.add');
 Route::post('/xrays/store', 'XrayController@store')->name('xrays.store');

 Route::get('/xrays', 'XrayController@index')->name('xrays');

 Route::get('/xrays/edit/{id}', 'XrayController@edit')->name('xrays.edit');
 Route::post('/xrays/update/{id}', 'XrayController@update')->name('xrays.update');

 Route::get('/xrays/delete/{id}', 'XrayController@destroy')->name('xrays.delete');

 


  





// Show Relations
// Route::get('/hassan', function(){
//     return App\Materal::find(1)->product;
// })->name('hassan');

// Route::get('/hassan', function(){
//     // return App\Product::find(2)->materal;
//     dd(App\Product::find(2)->materal);
// })->name('hassan');

// Show Tag
// Route::get('/hassan', function(){
//     return App\Materal::find(12)->tag;
//     //dd(App\Product::find(2)->materal);
// })->name('hassan');

// Route::get('/hassan', function(){
//     return App\Tag::find(2)->materal;
//     //dd(App\Product::find(2)->materal);
// })->name('hassan');

// Show All or find or relashon in cmd by code
// php artisan tiker
// Product::all();

// Add Row in database in cmd by
// php artisan tinker
// $ex = new \App\Product();
// $ex->name = 'Fluttr';
// $ex->save();
// $ex->product // connect to function insid MOdel Materal name is product() becouse here relationshap with me
// $ex // show me Relationshap
//$ex = \App\User::find(1);  // Searsh 


// Any where need info from table connection relation can use direct
// {{$materal->product->name}} 1-name function 2-name function 3-name colmun

// if no value in column can use default any think
// {{$materal->product->named ?? 'N/A'}}

// change this to database now + after write $user->save()
// $user->push();

// dd(request()->all());

//Post::truncate(); // delete info






//php artisan tinker
// Ticket::all();
//$ticket = new Ticket::all()
//$ticket->name = 'hassan'
//$ticket->age = 32
//$ticket->save()

//{{ $errors->first('name') }} //view

//@include('nav',['username' => 'hassan']) //home
//{{$username}} //view

//<title>about</title>
//<title>@yield('title')</title>  //home
//@section('title') //view
//abuot
//@endsection 
//@section('title','about') // or this enghe one line
//<title>@yeild('title',Learning Laravel 5.8')</title> // default

//option on view 
//$activeCustomer = Ticket::where('active',1)->get();
//$inactiveCustomer = Ticket::where('active',0)->get();
//return view('about',['activeCustomer' => $activeCustomer, 'inactiveCustomer' => $inactiveCustomer]);
//return view('about', compact('activeCustomer', 'inactiveCustomer')); // or this enghe one line
// can be write in model
//or
//$activeCustomer = Ticket::active()->get(); //controller
//public function scopeActive($query){return $query->where('active',1);}

//protected $fillable = ['name','age'];
//or
//protected $guarded = [];

//$c = Company::create(['name' => 'hassan', 'age' => 12]); //tinker

//public function show($customer){
    //$customer = Customer::where('id', $customer)->firstOrFail();
    //return view('customers.show',compact('customer'));
//}

//or just

//public function show(Customer $customer){
  //return view('customers.show',compact('customer'));
//}

//value="{{old('name') ?? $customer->name}}" // ?? = or

//php artisan make:controller TestController -r -m Ticket