<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FormationController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\FormationRequestController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AuthController;

// Formations
Route::get('/formations', [FormationController::class, 'index']);
Route::get('/formations/{id}', [FormationController::class, 'show']);
Route::post('/formations', [FormationController::class, 'store']);
Route::put('/formations/{id}', [FormationController::class, 'update']);
Route::delete('/formations/{id}', [FormationController::class, 'destroy']);

// Inscriptions
Route::post('/registrations', [RegistrationController::class, 'store']);
Route::get('/registrations', [RegistrationController::class, 'index']);
Route::get('/registrations/{id}', [RegistrationController::class, 'show']);
Route::put('/registrations/{id}', [RegistrationController::class, 'update']);
Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy']);
Route::post('/registrations/{id}/confirm', [RegistrationController::class, 'confirm']);
Route::post('/registrations/{id}/cancel', [RegistrationController::class, 'cancel']);

// Demandes de formation
Route::post('/formation-requests', [FormationRequestController::class, 'store']);
Route::get('/formation-requests', [FormationRequestController::class, 'index']);
Route::get('/formation-requests/{id}', [FormationRequestController::class, 'show']);
Route::put('/formation-requests/{id}', [FormationRequestController::class, 'update']);
Route::delete('/formation-requests/{id}', [FormationRequestController::class, 'destroy']);
Route::put('/formation-requests/{id}/status', [FormationRequestController::class, 'updateStatus']);

// Contact
Route::post('/contact', [ContactController::class, 'send']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::post('/contacts/{id}/read', [ContactController::class, 'markAsRead']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);

// Authentification
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [App\Http\Controllers\Api\AuthController::class, 'user'])->middleware('auth:sanctum');