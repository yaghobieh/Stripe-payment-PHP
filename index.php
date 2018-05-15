<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Pay page</title>
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Into to <u>React</u> course [$50]</h2>
        <form action="./charge.php" method="post" id="payment-form">
            <div class="form-row">
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name="first_name" placeholder="First name...">
                <input type="text" class="form-control mb-3 StripeElement StripeElement--empty" name="last_name" placeholder="Last name...">
                <input type="email" class="form-control mb-3 StripeElement StripeElement--empty" name="email" placeholder="Email address">
                <div id="card-element" class="form-control">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>
</body>
</html>