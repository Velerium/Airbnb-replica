<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;

class BraintreeController extends Controller
{
    public function index() {

        return view('userApartments/sponsorship');
    }

    public function payment(Request $request) {

        $data = $request->all();
        dd($data);

    }
}
