
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <div class="main">
        <div class="container">
            <h1>Products</h1>
            <div class="listing-section">
                @foreach ($products as $i => $item)
                <div class="product">
                    <div class="image-box">
                      <div class="images" id="image-{{ $i+1 }}"></div>
                    </div>
                    <div class="text-box">
                      <h2 class="item">{{ $item->name }}</h2>
                      <h3 class="price">${{ $item->price }}</h3>
                      <button type="button" name="item-1-button" id="item-1-button"><a href="{{ url('/products', $item->id) }}">Buy Now</a></button>
                      {{-- <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="price_id" value="{{ $item->stripe_price_id }}">
                        <button type="submit" id="checkout-button">Buy Now</button>
                      </form> --}}
                    </div>
                  </div>
                @endforeach

              </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>