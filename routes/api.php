<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use DDD\Http\Auth\AuthController;
use DDD\Http\Organizations\OrganizationController;
use DDD\Http\Tags\TagController;
use DDD\Http\Sites\SiteController;
use DDD\Http\Sites\SiteCrawlController;
use DDD\Http\Pages\PageController;
use DDD\Http\Pages\PageTagController;
use DDD\Http\Files\FileController;

// Auth
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
});

// Organizations
Route::get('organizations', [OrganizationController::class, 'index']);
Route::post('organizations', [OrganizationController::class, 'store']);
Route::get('organizations/{organization:slug}', [OrganizationController::class, 'show']);
Route::put('organizations/{organization:slug}', [OrganizationController::class, 'update']);
Route::delete('organizations/{organization:slug}', [OrganizationController::class, 'destroy']);

// Tags
Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index']);
    Route::post('/', [TagController::class, 'store']);
    Route::get('/{tag:slug}', [TagController::class, 'show']);
    Route::put('/{tag:slug}', [TagController::class, 'update']);
    Route::delete('/{tag:slug}', [TagController::class, 'destroy']);
});

// Sites
Route::prefix('{organization:slug}')->group(function () {
    Route::get('/sites', [SiteController::class, 'index']);
    Route::post('/sites', [SiteController::class, 'store']);
    Route::get('/sites/{site}', [SiteController::class, 'show']);
    Route::delete('/sites/{site}', [SiteController::class, 'destroy']);

    // Crawl site
    Route::prefix('/sites/{site}')->group(function () {
        Route::post('/crawl', [SiteCrawlController::class, 'crawl']);
    });
});

// Pages
Route::prefix('/sites/{site}')->group(function () {
    Route::get('/pages', [PageController::class, 'index']);
    Route::post('/pages', [PageController::class, 'store']);

    // Tagging
    route::post('/pages/{page}/tag', [PageTagController::class, 'tag']);
    route::post('/pages/{page}/untag', [PageTagController::class, 'untag']);
    route::post('/pages/{page}/retag', [PageTagController::class, 'retag']);
});

// Files
Route::prefix('{organization}')->group(function () {
    Route::get('/files', [FileController::class, 'index']);
    Route::post('/files', [FileController::class, 'store']);
    Route::delete('files/{file}', [FileController::class, 'destroy']);
});
