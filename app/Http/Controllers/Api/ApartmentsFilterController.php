<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
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
        
        try {
            $guestsNumber = $_GET['guests'];
        } catch (Exception $guestsNumber) {
            $guestsNumber = 0;
        }

        $priceMin = $_GET['priceMin'];
        $priceMax = $_GET['priceMax'];
        $bedNumber = $_GET['beds'];

        $apartments = Apartment::all();
        $filtered = $apartments->where('guests_n', '>=', $guestsNumber);
        $filtered1 = $filtered->where('price', '>=', $priceMin);
        $filtered2 = $filtered1->where('price', '<=', $priceMax);
        $filtered3 = $filtered2->where('beds_n', '>=', $bedNumber);

        return response()->json($filtered3);
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
        //
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
