<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diet_mart</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1875b01c1a.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .center{
            margin:auto;
            width:50%;
            text-align:center;
            padding:30px;
        }
        table,th,td{
            border:  2px solid grey;
        }
        .th_deg{
            font-size:30px;
            padding:5px;
        }
        .total{
            font-size:20px;
            padding:40px;
        }
        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarScroll" data-bs-offset="100">
    <section>
        @if(session()->has('message'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
        </button>
        {{session()->get('message')}}
        </div>
        @endif
    <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Name</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price </th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalprice=0; ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove the product?')"  href="{{route('front.removeCart',$cart->id)}}">Remove</a></td>
            </tr>
            <?php $totalprice=$totalprice+ $cart->price ?>
            @endforeach
        </table>
        <div>
            <h1 class="total">Total price: {{$totalprice}}</h1>
        </div>
        <div>
            <h1>Proceed to Order</h1>
            <a href="{{route('front.cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            
        </div>
    </div>
    <a href="{{route('front.back')}}" class="btn btn-danger back-button">Back</a>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
