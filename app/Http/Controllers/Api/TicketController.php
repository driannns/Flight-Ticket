<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\TicketResource;
use App\Models\FlightSchedule;
use Illuminate\Support\Facades\Validator;


class TicketController extends Controller
{

    public function index()
    {
        $posts = FlightSchedule::latest()->paginate(10);

        return new TicketResource(true, 'List Data Ticket', $posts);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'airline'     => 'required',
            'departure'   => 'required',
            'departure_code'   => 'required',
            'arrival'   => 'required',
            'arrival_code'   => 'required',
            'class'   => 'required',
            'price'   => 'required',
            'duration'   => 'required',
            'scheduled'   =>  'required',
            'estimated'   =>  'required',
            'date'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $posts = FlightSchedule::create([
            'airline'     => $request->airline,
            'departure'   => $request->departure,
            'departure_code'   => $request->departure_code,
            'arrival'   => $request->arrival,
            'arrival_code'   => $request->arrival_code,
            'class'   => $request->class,
            'price'   => $request->price,
            'duration'   => $request->duration,
            'scheduled'   => $request->scheduled,
            'estimated'   => $request->estimated,
            'date'   => $request->date,
        ]);
        
        return new TicketResource(true, 'Ticket telah ditambahkan', $posts);
    }

    public function create()
    {
        
    }
    
    public function showByAirline($airline)
    {
        $ticket = FlightSchedule::where('airline', 'LIKE', "%". $airline ."%")->get();
        
        return new TicketResource(true, 'Ticket Berdasarkan Airline', $ticket);

    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'airline'     => 'required',
            'departure'   => 'required',
            'departure_code'   => 'required',
            'arrival'   => 'required',
            'arrival_code'   => 'required',
            'class'   => 'required',
            'price'   => 'required',
            'duration'   => 'required',
            'scheduled'   =>  'required',
            'estimated'   =>  'required',
            'date'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $post = FlightSchedule::find($id);

        $post->update([
            'airline'     => $request->airline,
            'departure'   => $request->departure,
            'departure_code'   => $request->departure_code,
            'arrival'   => $request->arrival,
            'arrival_code'   => $request->arrival_code,
            'class'   => $request->class,
            'price'   => $request->price,
            'duration'   => $request->duration,
            'scheduled'   => $request->scheduled,
            'estimated'   => $request->estimated,
            'date'   => $request->date,
        ]);
        
        return new TicketResource(true, 'Ticket telah diperbaharui', $post);
    }


    public function destroy($id)
    {
        $post = FlightSchedule::find($id);
        
        $post->delete();

        return new TicketResource(true, 'Ticket telah dihapus', null);

    }
}
