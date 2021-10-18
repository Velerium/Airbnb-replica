<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Visitor;

class StatisticsController extends Controller
{
    public function show($id) {

        $apartment = Apartment::find($id);
        $view = Visitor::find($id);
        // dd($view);

        // getting visitor's number
        $arrayViews = DB::table('apartment_visitor')->where('apartment_id', $apartment->id)->get();
        $visitorsNumber = count($arrayViews);
        // get IP Address on click
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);  // return a string
        // dd($visitorsNumber); 
        $ipAddress = Visitor::where('IP_address', $hostname)->get();
        // dd($ipAddress);

        if(in_array($hostname, compact('ipAddress'))) {
            // dd(compact('ipAddress'));
            $visitor = new Visitor();
            $visitor->IP_address = $hostname;
            $visitor->save();

            $apartment->visitor()->attach($visitor->id);
        }
        return view('userApartments/statistics', compact('apartment', 'visitorsNumber'));
    }
}
