<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
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

        return view('apartments.index', compact('aptByIdUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $apartment = Apartment::find($id);
        // getting visitor's number
        $arrayViews = DB::table('apartment_visitor')->where('apartment_id', '=', $apartment->id)->get();
        $visitorsNumber = count($arrayViews);
        // get IP Address on click
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

        // TO DO
        $this->addVisitors($hostname);

        return view('apartments.show', compact('apartment', 'visitorsNumber'));
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
}