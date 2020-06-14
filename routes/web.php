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
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('portfolio', 'PortfolioController', array('except' => array('show')));
        Route::get('/portfolio/{directory}', 'PortfolioController@show')->name('portfolio');
        Route::delete('/portfolio/deleteimage/{id}', 'PortfolioController@deleteimage')->name('delete');
        Route::put('/portfolio/addimages/{directory}', 'PortfolioController@addimages')->name('addimages');
        Route::resource('category', 'CategoryController');
        Route::get('/subcategory', 'CategoryController@subcategory')->name('subcategory');
        Route::post('/storesubcategory', 'CategoryController@storesubcategory')->name('storesubcategory');
        Route::put('/updatesubcategory/{id}', 'CategoryController@updatesubcategory')->name('updatesubcategory');
        Route::delete('/destroysubcategory/{id}', 'CategoryController@destroysubcategory')->name('destroysubcategory');
        Route::resource('profile', 'ProfileController');
        Route::get('/team', 'ProfileController@team')->name('team');
        Route::get('/createteam', 'ProfileController@createteam')->name('createteam');
        Route::post('/storeteam', 'ProfileController@storeteam')->name('storeteam');
        Route::get('/editteam/{team}', 'ProfileController@editteam')->name('editteam');
        Route::put('/updateteam/{team}', 'ProfileController@updateteam')->name('updateteam');
        Route::delete('/deleteteam/{id}', 'ProfileController@deleteteam')->name('deleteteam');
        Route::get('about', 'ProfileController@about')->name('about');
        Route::put('/updateabout/{id}', 'ProfileController@updateabout')->name('updateabout');
        Route::get('/banner', 'WebController@banner')->name('banner');
        Route::get('/createbanner', 'WebController@createbanner')->name('createbanner');
        Route::get('/editbanner/{banner}', 'WebController@editbanner')->name('editbanner');
        Route::post('/storebanner', 'WebController@storebanner')->name('storebanner');
        Route::put('/updatebanner/{banner}', 'WebController@updatebanner')->name('updatebanner');
        Route::delete('/deletebanner/{id}', 'WebController@deletebanner')->name('deletebanner');
        Route::resource('promotion', 'PromotionController');
    });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/','HomeController@index');
Route::get('/harga','PricingController@index');
Route::get('/rileksmassage','AboutController@index');
Route::get('/ourwork','OurworkController@index');
Route::resource('blog','BlogController');
Route::get('event/{slug}','EventController@show');
Route::get('/blog/tag/{slug}', 'BlogController@tag');
// Route::get('/blog/search/', 'BlogController@search');
Route::get('/gallery/{slug}','GalleryController@index')->name('gallery');

Auth::routes(['verify' => true]);

