<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
    <p>Hi {{$data['first_name']}} {{$data['last_name']}}</p>
    <p>Your order has been successfully placed.</p>
    <br/>

    <table style="width: 600px; text-align:right">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr>
                    <td><img src="{{asset($item->options->image)}}" width="100" /></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>${{$item->price * $item->qty}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="border-top:1px solid #ccc;"></td>
                <td style="font-size:15px;font-weight:bold;border-top:1px solid #ccc;">Delivery Charge : {{ Session::get('charge')['charge'] }}</td>
            
            </tr>
            <tr>
                <td colspan="3" style="border-top:1px solid #ccc;"></td>
                <td style="font-size:15px;font-weight:bold;border-top:1px solid #ccc;">Subtotal : {{ $input['subtotal'] }}</td>
            </tr>    
        </tbody>
    </table>    
</body>
</html>