<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Service;
use App\Visitor;
use Illuminate\Support\Facades\DB;

class UserApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get user Id
        $user = Auth::user();
        // get all the apartments of this current user
        $aptByIdUser = DB::table('apartments')->where('user_id', '=', $user->id)->get();

        return view('userApartments.index', compact('aptByIdUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        $extraServices = Service::all();
        return view('userApartments.create', compact('apartments', 'extraServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rooms_n' => 'required',
            'beds_n' => 'required',
            'bathromms_n' => 'required',
            'guests_n' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'visible' => 'required',
            'price' => 'required',
        ]);

        $newApt = new Apartment();
        $this->createAndSave($newApt, $request);
        return redirect()->route('userApartments.show', $newApt->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        // getting visitor's number
        $arrayViews = DB::table('apartment_visitor')->where('apartment_id', '=', $apartment->id)->get();
        $visitorsNumber = count($arrayViews);
        // get IP Address on click
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

        // TO DO
        $this->addVisitors($hostname);

        return view('userApartments.show', compact('apartment', 'visitorsNumber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function addVisitors($hostname) { 
        
        $allVisitors = Visitor::all();
        // dd($allVisitors[2]);

        if(!in_array($hostname, compact('allVisitors'))) {
            $visitor = new Visitor();
            $visitor->IP_address = $hostname;
            $visitor->save();
        }
    }

    private function createAndSave(Apartment $newApt, Request $request) {

        $data = $request->all();

        $newApt->title = $data['title'];
        $newApt->description = $data['description'];
        $newApt->rooms_n = $data['rooms_n'];
        $newApt->beds_n = $data['beds_n'];
        $newApt->bathrooms_n = $data['bathrooms_n'];
        $newApt->guests_n = $data['guests_n'];
        $newApt->square_meters = $data['square_meters'];
        $newApt->address = $data['address'];
        $newApt->latitude = $data['latitude'];
        $newApt->longitude = $data['longitude'];
        $newApt->visible = $data['visible'];
        $newApt->price = $data['price'];
        $newApt->save();
        // TODO: add images
    }
}
