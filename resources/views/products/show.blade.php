<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
  </head>
  <body>

    <div class="container text-center">

        <h1>Shop Now</h1>
        <div class="row">
            <div class="col align-items-start">
            <div class="listing-section">
                <div class="product w-100">
                    <div class="image-box">
                      <div class="images" id="image-1"></div>
                    </div>
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <p>${{ $product->price }}</p>
                </div>
            </div>
            </div>
            <div class="col">

                <form action="{{ route('products.charge') }}" method="POST" id="payment-form">
                    @csrf
                    <div>
                        <p>Use credit or debit card</p>
                        <label for="card-element">
                            
                        </label>
                        
                        <div id="card-element" style="border:solid 1px #ddd;padding:10px">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
            
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit">Submit Payment</button>
                </form>
            
                <script src="https://js.stripe.com/v3/"></script>
                <script>
                    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
                    var elements = stripe.elements();
            
                    var style = {
                        base: {
                            color: '#32325d',
                            lineHeight: '18px',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            fontSmoothing: 'antialiased',
                            fontSize: '16px',
                            '::placeholder': {
                                color: '#aab7c4'
                            }
                        },
                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
                    };
            
                    var card = elements.create('card', {style: style});
                    card.mount('#card-element');
            
                    card.addEventListener('change', function(event) {
                        var displayError = document.getElementById('card-errors');
                        if (event.error) {
                            displayError.textContent = event.error.message;
                        } else {
                            displayError.textContent = '';
                        }
                    });
            
                    var form = document.getElementById('payment-form');
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();
            
                        stripe.createPaymentMethod({
                            type: 'card',
                            card: card,
                            billing_details: {
                                // Include any additional collected billing details.
                            },
                        }).then(function(result) {
                            if (result.error) {
                                var errorElement = document.getElementById('card-errors');
                                errorElement.textContent = result.error.message;
                            } else {
                                form.append('<input type="hidden" name="payment_method" value="' + result.paymentMethod.id + '">');
                                form.submit();
                            }
                        });
                    });
                </script>

            </div>
          </div>
      </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

