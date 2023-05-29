<?php

use Illuminate\Http\Request;

use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Read All
Route::get('ticket', [TicketController::class, 'index']);

// Create
Route::post('ticket', [TicketController::class, 'store']);

// Show
Route::get('ticket/airline/{airline}', [TicketController::class, 'showByAirline']);
Route::get('ticket/departurecode/{departureCode}', [TicketController::class, 'showByDepartureCode']);
Route::get('ticket/arrivalcode/{arrivalcode}', [TicketController::class, 'showByArrivalCode']);

// Update
Route::put('ticket/{id}', [TicketController::class, 'update']);

// Delete
Route::delete('ticket/{id}', [TicketController::class, 'destroy']);
