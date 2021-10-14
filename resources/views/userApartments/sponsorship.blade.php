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
          <div class="col-md-8 col-md-offset-2">
            <div id="dropin-container"></div>
            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button type="submit">Purchase</button>
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

            // Step four: when the user is ready to complete their
            //   transaction, use the dropinInstance to get a payment
            //   method nonce for the user's selected payment method, then add
            //   it a the hidden field before submitting the complete form to
            //   a server-side integration
            document.getElementById('nonce').value = payload.nonce;
            form.submit();
          });
        });
      });
  </script>
    
@endsection

