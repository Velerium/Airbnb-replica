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
        // get IP Address on click
        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);  // return a string
        
        // if(Visitor::where('IP_address', '!=', $hostname)) {
        //     $visitor = new Visitor();
        //     $visitor->IP_address = $hostname;
        //     $visitor->save();

        //     $apartment->visitor()->attach($visitor->id);
        // }
        
        $arrayViews = DB::table('apartment_visitor')->where('apartment_id', $apartment->id)->get();
        $visitorsNumber = count($arrayViews);
        $views = $visitorsNumber;

        return view('userApartments/statistics', compact('apartment', 'visitorsNumber'));
    }
}
