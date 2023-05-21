<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\FlightSchedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $queryString = http_build_query([
            'access_key' => env('API_KEY'),
            'limit' => 100,
            'offset' => null
        ]);
        $ch = curl_init(sprintf('%s?%s', 'http://api.aviationstack.com/v1/flights', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $api_result = json_decode($json);
    
        foreach ($api_result->data as $data) {
            $class = array('Economy', 'Business', 'First Class', 'Premium Economy');

            $carbonDateTimeSchedule = Carbon::parse($data->departure->scheduled);
            $scheduled = $carbonDateTimeSchedule->format('Y-m-d H:i:s');

            $carbonDateTimeEstimated = Carbon::parse($data->arrival->estimated);
            $estimated = $carbonDateTimeEstimated->format('Y-m-d H:i:s');

            $duration = $carbonDateTimeSchedule->diff($carbonDateTimeEstimated);
    
            $flightSchedule = new FlightSchedule;
            $flightSchedule->airline = $data->airline->name;
            $flightSchedule->departure = $data->departure->airport;
            $flightSchedule->departure_code = $data->departure->iata;
            $flightSchedule->arrival = $data->arrival->airport;
            $flightSchedule->arrival_code =  $data->arrival->iata;
            $flightSchedule->class = array_rand(array_flip($class));
            $flightSchedule->price = round(rand(1000000, 10000000));
            $flightSchedule->duration = $duration->format('%hh %im');
            $flightSchedule->scheduled = $scheduled;
            $flightSchedule->estimated =  $estimated;
            $flightSchedule->date = $data->flight_date;
            $flightSchedule->save();
        };
    }
}
