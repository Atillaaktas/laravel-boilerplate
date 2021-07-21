@extends('layouts.app')


@section('content')
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Order Detail</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                    <th scope="col"> Id</th>
                        <th scope="col">Ürün Id</th>
                        <th scope="col">Sipariş Id</th>
                        <th scope="col">Miktar</th>
                        <th scope="col">Fiyat</th>
                        <th scope="col">Toplam Fiyat</th>
                        <th scope="col">Durum</th>
                        
                    </tr>
                </thead>
                <tbody>
                
                @foreach($inorders as $inorder)
                <tr>
                <td>{{ $inorder->id }} </td> 
                <td>{{ $inorder->product_name }} </td>
                <td>{{ $inorder->order_id }}</td> 
                <td>{{ $inorder->quantity }}</td>
                <td>{{ $inorder->price }}</td>
                <td>{{ $inorder->total_price }}</td>
                <td>{{ $inorder->status_id }}</td>
                </tr>
                @endforeach 
                </tbody>
            </table>
        </div>
    </body>
</html>

@endsection