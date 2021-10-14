<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use Braintree\Gateway;
use Braintree_Transaction;

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

    public function pay(Request $request) {

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $data = $request->all();

        // $amount = Sponsorship::where('id', $data['sponsor_id'])->pluck('sponsorship_cost')->first();
        // dd($amount);

        // $payload = $request->input('payload', false);
        // $nonce = $request->payment_method_nonce;
        // $nonceFromTheClient = $request->payment_method_nonce;
        // dd($nonce);

        // The sale call returns a Transaction Result Object which contains the transaction and information about the request
        $status = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        // dd($status);

        if($status->success) {
            $transaction = $status->transaction;
            // TODO: Return to userApartments.show with data['apartment_id] to show a success message
            echo "Pagamento effettuato";
        }

        // return view('userApartments/sponsorship', compact('status'));

        // return response()->json($status);
}
}
