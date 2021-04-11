<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TravelController extends Controller
{
    public function index(){
        return "Hello World";
    }

    public function getAllCategoriesVenues()
    {

        $response = Http::withOptions(['verify' => false])->get($_ENV['FOURSQUARE_API']."categories", [
            'client_id' => $_ENV['CLIENT_ID'],
            'client_secret' => $_ENV['CLIENT_SECRET'],
            'v' => $_ENV['API_VERSION']
        ]);

        return response()->json([
            'data' => $response->collect()["response"]
        ]);
    }

    public function getVenues(Request $request)
    {
        
        $city = empty($request->input('city')) ? '' : $request->input('city');
        $radius = empty($request->input('radius')) ? 100 : $request->input('radius');
        $category = empty($request->input('category')) ? '' : $request->input('category');
        $proceed = empty($city) ? false : true;

        if($proceed)
        {
            $response = Http::withOptions(['verify' => false])->get($_ENV['FOURSQUARE_API']."search", [
                'client_id' => $_ENV['CLIENT_ID'],
                'client_secret' => $_ENV['CLIENT_SECRET'],
                'v' => $_ENV['API_VERSION'],
                'radius' => $radius,
                'near' => $city,
                'categoryId' => $category
            ]);

            return response()->json([
                'data' => $response->collect()["response"]
            ]);
        }
        else
        {
            return response()->json([
                'data' => 'No City Specified'
            ], 400);
        }
    }

    public function getWeatherCity(Request $request)
    {
        $query = empty($request->input('query')) ? '' : $request->input('query');
        $proceed = empty($query) ? false : true;
        if($proceed)
        {
            $response = Http::withOptions(['verify' => false])->get($_ENV['OWM_API']."forecast", [
                'appid' => $_ENV['APP_ID'],
                'q' => $query
            ]);

            return response()->json([
                'data' => $response->collect()['list']
            ]);
        }
        else
        {
            return response()->json([
                'data' => 'Query Empty',
            ], 400);
        }
    }
}
