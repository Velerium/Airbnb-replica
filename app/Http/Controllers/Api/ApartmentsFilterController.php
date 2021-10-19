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
        $flag = false;

        try {
            $serviceID = $_GET['service'];
        } catch (Exception $e) {
            $flag = true;
        }
        
        $guestsNumber = $_GET['guests'];
        $priceMin = $_GET['priceMin'];
        $priceMax = $_GET['priceMax'];
        $bedsNumber = $_GET['beds'];
        $roomsNumber = $_GET['rooms'];

        if (!$flag) {
    
            $servicedApt = collect(new Apartment);
            
            foreach ($apartments as $apartment) {
                $aptServices = [];
                foreach ($apartment->service as $service) {
                    $aptServices[] = $service->id;
                };
                if(array_intersect($aptServices, $serviceID) == $serviceID) {
                    $servicedApt[] = $apartment;
                };
            }
        }

        if (!$flag) {
            $filtered = $servicedApt->where('guests_n', '>=', $guestsNumber);
        } else {
            $filtered = $apartments->where('guests_n', '>=', $guestsNumber);
        }
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
