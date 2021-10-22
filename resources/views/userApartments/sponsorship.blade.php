@extends('layouts.app')

@section('content')

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container">
    <form method="POST" id="payment-form" action="{{ route('payment') }}">
      @csrf
      @method("POST")
        <div class="row">
          <div class="col mt-5 mb-5">
            <label for="amount">
              <span class="input-label">Importo totale da pagare euro</span>
              <input id="amount" name="amount" placeholder="amount" value="{{$data['cost_sponsorship']}}" disabled>
              <div class="input-wrapper amount-wrapper">
                  <input type="hidden" name="apartment_id" value="{{$data['apartment_id']}}">
                  <input type="hidden" name="sponsorship_id" value="{{$data['sponsorship_id']}}">
              </div>
            </label>

            <div id="dropin-container" class="text-center"></div>
            <div class="text-right">
              <button type="submit" class="btn btn-success">Effetua il pagamento</button>
            </div>
          </div>
        </div>
    </form>    
  </div>

  <script type="text/javascript">
    var button = document.querySelector('#submit-button');
    var client = "{{$token}}"

    braintree.dropin.create({
      authorization: client,
      container: '#dropin-container'
    }, (error, dropinInstance) => {
        if (error) console.error(error);

        form.addEventListener('submit', event => {
          event.preventDefault();

          dropinInstance.requestPaymentMethod((error, payload) => {
            if (error) console.error(error);

            document.getElementById('nonce').value = payload.nonce;
            form.submit();
          });
        });
      });
  </script> 

@endsection

