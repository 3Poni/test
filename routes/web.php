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
    Route::group(['namespace'=>'App\Http\Controllers\Main'], function() {
        Route::get('/', IndexController::class);
        Route::get('/about', AboutController::class);
        Route::get('/search', SearchController::class)->name('main.search.index');

    });

    Route::group(['namespace'=>'App\Http\Controllers\Main\Articles'], function() {
        Route::get('/articles', IndexController::class)->name('main.articles.index');
        Route::get('/articles/{article}', ShowController::class)->name('main.articles.show');

        Route::group(['namespace' => 'Comments', 'prefix' => '{article}/comments'], function(){
            Route::post('/', 'StoreController')->name('article.comment.store');
        });
        Route::group(['namespace' => 'Likes', 'prefix' => '{article}/likes'], function() {
            Route::post('/', 'StoreController')->name('article.like.store');
        });


    });
    Route::group(['namespace' => 'App\Http\Controllers\Personal\Main', 'prefix' => 'personal', 'middleware' => ['auth', 'verified'] ], function (){
        Route::get('/', PersonalController::class)->name('personal.main.index');
    });
        Route::group(['namespace' => 'App\Http\Controllers\Personal\Likes', 'prefix' => 'personal/likes'], function (){
            Route::get('/', IndexController::class)->name('personal.likes.index');
            Route::delete('/{article}', DeleteController::class)->name('personal.likes.delete');
        });

        Route::group(['namespace' => 'App\Http\Controllers\Personal\Comments', 'prefix' => 'personal/comments'], function (){
            Route::get('/', IndexController::class)->name('personal.comments.index');
            Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
            Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
            Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
        });

        Route::group(['namespace' => 'App\Http\Controllers\Personal\Articles', 'prefix' => 'personal/articles'], function (){
            Route::get('/', IndexController::class)->name('personal.articles.index');
            Route::get('/{article}/edit', EditController::class)->name('personal.article.edit');
            Route::get('/create', CreateController::class)->name('personal.article.create');
            Route::post('/', StoreController::class)->name('personal.article.store');
            Route::patch('/{article}', UpdateController::class)->name('personal.article.update');
            Route::delete('/{article}', DeleteController::class)->name('personal.article.delete');
        });

    Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified'] ], function (){
            Route::get('/', IndexController::class)->name('admin.main.index');
        });

        Route::group(['namespace' => 'App\Http\Controllers\Admin\Article', 'prefix' => 'admin/articles'], function (){
            Route::get('/', IndexController::class)->name('admin.article.index');
            Route::get('/create', CreateController::class)->name('admin.article.create');
            Route::post('/', StoreController::class)->name('admin.article.store');
            Route::get('/{article}', ShowController::class)->name('admin.article.show');
            Route::get('/{article}/edit', EditController::class)->name('admin.article.edit');
            Route::patch('/{article}', UpdateController::class)->name('admin.article.update');
            Route::delete('/{article}', DeleteController::class)->name('admin.article.delete');
        });

        Route::group(['namespace' => 'App\Http\Controllers\Admin\Category', 'prefix' => 'admin/categories'], function (){
            Route::get('/', IndexController::class)->name('admin.category.index');
            Route::get('/create', CreateController::class)->name('admin.category.create');
            Route::post('/', StoreController::class)->name('admin.category.store');
            Route::get('/{category}', ShowController::class)->name('admin.category.show');
            Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
            Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
            Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
        });

        Route::group(['namespace' => 'App\Http\Controllers\Admin\Tag', 'prefix' => 'admin/tags'], function (){
            Route::get('/', IndexController::class)->name('admin.tag.index');
            Route::get('/create', CreateController::class)->name('admin.tag.create');
            Route::post('/', StoreController::class)->name('admin.tag.store');
            Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
            Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
            Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
            Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
    });

        Route::group(['namespace' => 'App\Http\Controllers\Admin\Users', 'prefix' => 'admin/users'], function (){
            Route::get('/', IndexController::class)->name('admin.user.index');
            Route::get('/create', CreateController::class)->name('admin.user.create');
            Route::post('/', StoreController::class)->name('admin.user.store');
            Route::get('/{user}', ShowController::class)->name('admin.user.show');
            Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
            Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
            Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
    });

Auth::routes(['verify' => true]);

