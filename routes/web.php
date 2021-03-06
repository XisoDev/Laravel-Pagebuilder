<?php

use Illuminate\Support\Facades\Route;
use XisoDev\LaravelPageBuilder\LaravelPageBuilder;

// handle asset requests
Route::any( config('pagebuilder.general.assets_url') . '{any}', function() {

    $builder = new LaravelPageBuilder(config('pagebuilder'));
    $builder->handlePageBuilderAssetRequest();

})->where('any', '.*');

// handle uploaded file requests
Route::any( config('pagebuilder.general.uploads_url') . '{any}', function() {

    $builder = new LaravelPageBuilder(config('pagebuilder'));
    $builder->handleUploadedFileRequest();

})->where('any', '.*');


// handle all website manager requests
Route::any( config('pagebuilder.website_manager.url') . '{any}', function() {

    $builder = new LaravelPageBuilder(config('pagebuilder'));
    $builder->handleRequest();

})->where('any', '.*');

if (config('pagebuilder.router.use_router')) {

    // pass all requests to LaravelPageBuilder's router
    Route::any( '/{any}', function() {

        $builder = new LaravelPageBuilder(config('pagebuilder'));
        $builder->handlePublicRequest();

    })->where('any', '.*');

}
