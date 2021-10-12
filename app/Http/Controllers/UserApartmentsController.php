<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Service;
use App\Visitor;
use App\Image;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $services = Service::all();
        return view('userApartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apt)
    {

        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'rooms_n' => 'required',
            'beds_n' => 'required',
            'bathrooms_n' => 'required',
            'guests_n' => 'required',
            'square_meters' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'visible' => 'required',
            'price' => 'required',
            'images'=>['required','image'],
        ]);

        $this->createAndSave($apt, $request);
        return redirect()->route('userApartments.show', $apt);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apt = Apartment::find($id);
        
        // getting visitor's number

        $arrayViews = DB::table('apartment_visitor')->where('apartment_id', '=', $apt->id)->get();
        $visitorsNumber = count($arrayViews);

        // get IP Address on click
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

        $this->addVisitors($hostname, $apt);

        return view('userApartments.show', compact('apt', 'visitorsNumber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apt = Apartment::find($id);
        $services = Service::all();
        return view('userApartments.edit', compact('services', 'apt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apt)
    {
        $this->createAndSave($apt, $request);
        return redirect()->route('userApartments.show', 'apt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apt = Apartment::find($id);

        $apt->service()->detach();
        $apt->visitor()->detach();
        $apt->delete();

        return redirect()->route('userApartments.index');
    }

    

    public function addVisitors($hostname, $apt) { 
        
        $allVisitors = Visitor::all();

        if(!in_array($hostname, compact('allVisitors') )) {
            $visitor = new Visitor();
            $visitor->IP_address = $hostname;
            $visitor->save();

            $apt->visitor()->attach($visitor->id);
        }
    }

    private function createAndSave(Apartment $apt, Request $request) {

        $data = $request->all();
        $user = Auth::user();

        $apt->title = $data['title'];
        $apt->summary = $data['summary'];
        $apt->rooms_n = $data['rooms_n'];
        $apt->beds_n = $data['beds_n'];
        $apt->bathrooms_n = $data['bathrooms_n'];
        $apt->guests_n = $data['guests_n'];
        $apt->square_meters = $data['square_meters'];
        $apt->address = $data['address'];
        $apt->latitude = $data['latitude'];
        $apt->longitude = $data['longitude'];
        $apt->visible = $data['visible'];
        $apt->price = $data['price'];
        $apt->user_id = $user->id;
        $apt->save();

        foreach($data['servicesList'] as $serviceId) {
            $apt->service()->attach($serviceId);
        }
        
        foreach($data['images'] as $image){
            $newImg= new Image();
            $img = Storage::put('images',$image);
            $newImg->url = $img;
            $newImg->apartment_id = $apt->id;
            $newImg->save();
        }  
    }
}
