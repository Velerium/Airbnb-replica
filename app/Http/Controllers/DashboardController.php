<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $aptByIdUser = DB::table('apartments')->where('user_id', '=', $user->id)->get();

        return view('dashboard', compact('user', 'aptByIdUser'));
    }
}
