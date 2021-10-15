<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorship;
use Illuminate\Support\Facades\DB;
use Braintree\Gateway;

class BraintreeController extends Controller
{
    public function index(Request $request) {

        $data = $request->all();

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $token = $gateway->clientToken()->generate();
        // dd($token);

        return view('userApartments/sponsorship', compact('data'), ['token' => $token]);
    }    

    public function payment(Request $request) {
        
        $data = $request->all();

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        
        $amount = Sponsorship::where('id', $data['sponsorship_id'])->pluck('cost_sponsorship')->first();

        /* The sale call returns a Transaction Result Object which contains 
        the transaction and information about the request */
        $status = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        
        if($status->success) {
            // save the data
            $apt = Apartment::find($data['apartment_id']);
            $apt->sponsorship()->attach($data['sponsorship_id']);
            // $transaction = $status->transaction;

            return redirect()->route('userApartments.show', $data['apartment_id']);
        } else {
            print_r($status->errors);
        }   
    }
}
