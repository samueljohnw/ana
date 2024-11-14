@extends('template.fullwidth')


@section('content')

    <section class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="row align-middle grid-x">
            <div class="column small-12 medium-12">
                <h2>Seer School</h2>
                <h3 style="color:#333">
                    Get it done
                </h3>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
        <form action="/purchase/prod_R9Emih4MVRQhVk" method="post" id="payment-form">
          <input type="hidden" name="plan" value="prod_R9Emih4MVRQhVk">
          @csrf
          <div class="form-group">
            <div class="card-header">
              <label for="card-element">
                Enter your credit card information
              </label>
            </div>
            <div class="card-body">
              <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
              </div>
              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>

            </div>
          </div>
          <div class="card-footer">
            <button id="card-button" class="btn btn-dark" type="button"
              data-secret="{{ $intent->client_secret }}">Subscribe</button>
          </div>
        </form>
        </div>
      </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe('{{ env("STRIPE_KEY") }}');
var elements = stripe.elements();
var card = elements.create('card');
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;

cardButton.addEventListener('click', async (e) => {
    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: card
            }
        }
    );

    if (error) {
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
    } else {
        // Send the token to your server.
        stripeTokenHandler(setupIntent.payment_method);
    }
});

// Submit the form with the token.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
    @endsection
