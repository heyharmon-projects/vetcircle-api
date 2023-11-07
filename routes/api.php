<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use DDD\Http\Organizations\OrganizationTagController;
use DDD\Http\Owners\Pets\PetController;
use DDD\Http\Owners\Tags\TagAssignPetController;
use DDD\Http\Owners\Tags\TagClaimController;
use DDD\Http\Owners\Tags\TagController;

Route::middleware('auth:sanctum')->group(function() {
  // Owners
  Route::prefix('owners')->group(function() {
    // Owner / Pets
    Route::prefix('pets')->group(function() {
      Route::get('/', [PetController::class, 'index']);
      Route::post('/', [PetController::class, 'store']);
    });
    
    // Owner / Tags
    Route::prefix('tags')->group(function() {
      Route::get('/', [TagController::class, 'index']);
      Route::post('/{tag:uuid}/claim', TagClaimController::class);
      Route::post('/{tag:uuid}/assign-pet/{pet:uuid}', TagAssignPetController::class);
    });
  });

  // Organizations
  Route::prefix('{organization:slug}')->group(function() {
    // Tags
    Route::prefix('tags')->group(function() {
      Route::get('/', [OrganizationTagController::class, 'index']);
      Route::post('/', [OrganizationTagController::class, 'store']);
      // Route::get('/{tag}', [OrganizationTagController::class, 'show']);
      // Route::put('/{tag}', [OrganizationTagController::class, 'update']);
      // Route::delete('/{tag}', [OrganizationTagController::class, 'destroy']);
    });
  });
});