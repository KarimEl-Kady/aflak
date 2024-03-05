<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\ApiMethodsService;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelTranslation;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class HotelController extends Controller
{
    use ApiTrait;
    protected $apiService;
    public function __construct(ApiMethodsService $apiService)
    {
        $this->apiService = $apiService;
    }
    public function search_hotels(Request $request){
        try{

            $apiUrl = 'https://softtech.crazyidea.online/organization/api/fetch_filter_hotels';

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];


            $response = $this->apiService->withHeaders($headers)->postApiData($apiUrl, $request->all());
            $responseData = $response->json();
            // dd($responseData);

            $message = "fetch-hotels";

        return $this->dataResponse($message, $responseData['data'], 200);
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(),500);
        }
    }

    public function fetch_hotel_rooms(Request $request){
        try{
            // dd($request->hotel_id);
            $apiUrl = 'https://softtech.crazyidea.online/organization/api/fetch_hotel_rooms';

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];


            $response = $this->apiService->withHeaders($headers)->postApiData($apiUrl, $request->all());
            $responseData = $response->json();


            $message = "fetch_hotel_rooms";

        return $this->dataResponse($message, $responseData['data'], 200);
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(),500);
        }
    }

    public function fetch_hotel_details(Request $request){
        try{

            $apiUrl = 'https://softtech.crazyidea.online/organization/api/fetch_hotel_details';

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ];

            $response = $this->apiService->withHeaders($headers)->postApiData($apiUrl, $request->all());
            $responseData = $response->json();
            $message = "fetch_hotel_details";
            //getting hotel data
            $hotel_names = ($responseData['data']['titles']);
            $hotel_country = $responseData['data']['country'];
            $hotel_city = $responseData['data']['city'];

            // Hotel::create([
            //     'ex_id' => $responseData['data']['id']
            // ]);
            if(!(DB::table('hotels')->where('ex_id',$responseData['data']['id'])->first())){
            $data['ex_id'] = $responseData['data']['id'];


            foreach($hotel_names as $name){
                foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                    $data[$name['locale']] = ['name' => $name['title'],
                  ];

                }
                Hotel::create($data);
                }

            foreach($hotel_country['titles'] as $country){
                    foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                        $country_data[$country['locale']] = ['country' => $country['title'],
                      ];
                      DB::table('hotel_translations')
                    ->where('hotel_id', Hotel::where('ex_id',$data['ex_id'])->pluck("id")->first())
                    ->where('locale', $country['locale'])
                    ->update(['country' => $country['title']]);
                    }

                    }

                    foreach($hotel_city['titles'] as $city){
                        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
                            $city_data[$city['locale']] = ['city' => $city['title'],
                          ];
                          DB::table('hotel_translations')
                        ->where('hotel_id', Hotel::where('ex_id',$data['ex_id'])->pluck("id")->first())
                        ->where('locale', $city['locale'])
                        ->update(['city' => $city['title']]);
                        }
                        }
                }

        return $this->dataResponse($message, $responseData['data'], 200);
        }catch(\Exception $ex){
            return $this->returnException($ex->getMessage(),500);
        }
    }
}

