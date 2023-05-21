<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Models\FlightSchedule;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $ticket = FlightSchedule::paginate(10);
    $formattedScheduledTimes = [];
    $formattedEstimatedTimes = [];
    foreach ($ticket as $tickets) {
        $carbonScheduleTime = Carbon::parse($tickets->scheduled);
        $formattedScheduledTime = $carbonScheduleTime->format('H:i');
        $formattedScheduledTimes[] = $formattedScheduledTime;
    }
    foreach ($ticket as $tickets) {
        $carbonestimatedTime = Carbon::parse($tickets->estimated);
        $formattedEstimatedTime = $carbonestimatedTime->format('H:i');
        $formattedEstimatedTimes[] = $formattedEstimatedTime;
    }
    return view('index', compact('ticket', 'formattedScheduledTimes', 'formattedEstimatedTimes'));
});

Route::resource('ticket', TicketController::class);
