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

        Route::namespace('Common')->prefix('common')->group(function() {

            Route::get('slider/{slug}', 'CommonController@slider');

            Route::get('settings', 'CommonController@settings');
        });
    });

    Route::namespace('Backend')->prefix('backend')->middleware(CanManageBlog::class)->group(function() {

        Route::namespace('Setting')->group(function() {

            Route::get('settings', 'SettingController@index');

            Route::post('settings/create', 'SettingController@create');

            Route::prefix('settings/{setting}')->group(function() {

                Route::get('show', 'SettingController@show');

                Route::post('update', 'SettingController@update');
            });
        });

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

        Route::namespace('Slider')->group(function() {

            Route::get('sliders', 'SliderController@index');

            Route::post('sliders/create', 'SliderController@create');

            Route::prefix('sliders/{slider}')->group(function() {

                Route::get('show', 'SliderController@show');

                Route::post('update', 'SliderController@update');

                Route::post('article', 'SliderController@article');
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
