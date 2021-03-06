<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Service;
use App\Visitor;
use App\Image;
use App\Sponsorship;
use App\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class UserApartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // get user Id
        $user = Auth::user();
        // get all the apartments of this current user
        $aptByIdUser = DB::table('apartments')->where('user_id', '=', $user->id)->get();

        return view('userApartments.index', compact('user', 'aptByIdUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $sponsorships = Sponsorship::all();
        return view('userApartments.create', compact('services', 'sponsorships'));
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
            'title' => 'required|min:5|max:100',
            'summary' => 'required|min:10',
            'rooms_n' => 'required|integer|min:1|max:25',
            'beds_n' => 'required|integer|min:1|max:50',
            'bathrooms_n' => 'required|integer|min:1|max:15',
            'guests_n' => 'required|integer|min:1|max:50',
            'square_meters' => 'nullable|integer|min:15|max:1000',
            'address' => 'required|min:5|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'visible' => 'required',
            'price' => 'required',
        ]);

        $this->createAndSave($apt, $request);
        return redirect()->route('userApartments.show', $apt->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apt = Apartment::findOrFail($id);
        $sponsorships = Sponsorship::all();
        $sponsored = DB::table('apartment_sponsorship')->where('apartment_id', $apt->id)->first();
        $messages = Message::where('apartment_id', $apt->id)->get();
        
        if($messages->isEmpty()) {
            $sender = User::where('id', null);
        } else {
            foreach($messages as $msg) {
                $sender = User::where('id', $msg->user_id)->first();
            }
        }

        if($sponsored != null) {
            // calculating the duration from created_at moment
            $hours = Sponsorship::where('id', $sponsored->sponsorship_id)->pluck('duration')->first();
            $duration = Carbon::parse($sponsored->created_at)->addHours($hours);
            $now = Carbon::now();
            // if sponsosrhsip's duration is more than actual datetime, show me the sponsorship duration
            if($duration->greaterThan($now)){
                $sponsored = $duration;
            // else don't show anything
            } else {
                $sponsored = null;
            };
        }
        
        $images= Image::where('apartment_id', $apt->id)->get();

        return view('userApartments.show', compact('apt', 'images', 'sponsorships', 'sponsored', 'messages', 'sender'));
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
        $images= Image::where('apartment_id', $apt->id)->get();
        $services = Service::all();

        return view('userApartments.edit', compact('apt', 'images', 'services'));
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
        $apt = Apartment::find($id);
        $this->createAndSave($apt, $request);
        return redirect()->route('userApartments.show', $apt->id);
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
        $apt->sponsorship()->detach();
        $apt->visitor()->detach();
        $apt->delete();

        return redirect()->route('userApartments.index');
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
        };

        // dd($data['imgFiles']);
        // foreach($data['imgFiles'] as $img){
        //     $pathImg = Storage::putFile('images', $img);
        //     $newImg= new Image();
        //     $newImg->url = $pathImg;
        //     $newImg->apartment_id = $apt->id;
        //     $newImg->save();
        // }
    } 
}
