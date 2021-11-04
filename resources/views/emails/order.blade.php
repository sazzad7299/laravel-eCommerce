<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Order Placed</title>
</head>
<body>
    <h1>Hi! Dear <strong>{{ $name }}</strong></h1>
    <p>Your Order has been placed Successfully</p>
    <p>Your Order No#{{ $order_id }}</p>
    <p>You Have to Pay {{ $amount }}</p>
    
</body>
</html>