<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use Exception;

class ApartmentsFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $apartments = Apartment::with('service')->get();

        try {
            $guestsNumber = $_GET['guests'];
        } catch (Exception $guestsNumber) {
            $guestsNumber = 0;
        }
        
        $priceMin = $_GET['priceMin'];
        $priceMax = $_GET['priceMax'];
        $bedsNumber = $_GET['beds'];
        $roomsNumber = $_GET['rooms'];
        $serviceID = $_GET['service'];

        $filteredServices = [];
        $filteredServices[] = $serviceID;

        $servicedApt = collect(new Apartment);
        
        foreach ($apartments as $apartment) {
            foreach ($apartment->service as $service) {
                if(in_array($service->id, $filteredServices)) {
                    $servicedApt[] = $apartment;
                };
            };
        }

        $filtered = $servicedApt->where('guests_n', '>=', $guestsNumber);
        $filtered1 = $filtered->where('price', '>=', $priceMin);
        $filtered2 = $filtered1->where('price', '<=', $priceMax);
        $filtered3 = $filtered2->where('beds_n', '>=', $bedsNumber);
        $filtered4 = $filtered3->where('rooms_n', '>=', $roomsNumber);

        return response()->json($filtered4);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $apartment = Apartment::where('id', $id)->with(['services'])->first();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
