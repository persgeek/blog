<?php

use PG\Blog\Http\Backend\Middleware\CanManageBlog;
use Illuminate\Support\Facades\Route;

Route::namespace('PG\\Blog\\Http')->prefix('blog')->group(function() {

    Route::namespace('Frontend')->prefix('frontend')->group(function() {

        Route::namespace('Article')->group(function() {

            Route::get('articles', 'ArticleController@index');

            Route::prefix('articles/{article}')->group(function() {

                Route::get('show', 'ArticleController@show');
            });
        });

        Route::namespace('Category')->group(function() {

            Route::get('categories', 'CategoryController@index');

            Route::prefix('categories/{category}')->group(function() {

                Route::get('show', 'CategoryController@show');

                Route::get('articles', 'CategoryController@articles');
            });
        });
    });

    Route::namespace('Backend')->prefix('backend')->middleware(CanManageBlog::class)->group(function() {

        Route::namespace('Image')->group(function() {

            Route::get('images', 'ImageController@index');

            Route::post('images/create', 'ImageController@create');

            Route::prefix('images/{image}')->group(function() {

                Route::get('show', 'ImageController@show');
            });
        });

        Route::namespace('Article')->group(function() {

            Route::get('articles', 'ArticleController@index');

            Route::post('articles/create', 'ArticleController@create');

            Route::prefix('articles/{article}')->group(function() {

                Route::get('show', 'ArticleController@show');

                Route::post('update', 'ArticleController@update');

                Route::post('category', 'ArticleController@category');

                Route::post('image', 'ArticleController@image');
            });
        });

        Route::namespace('Category')->group(function() {

            Route::get('categories', 'CategoryController@index');

            Route::post('categories/create', 'CategoryController@create');

            Route::prefix('categories/{category}')->group(function() {

                Route::get('show', 'CategoryController@show');

                Route::post('update', 'CategoryController@update');
            });
        });
    });
});
