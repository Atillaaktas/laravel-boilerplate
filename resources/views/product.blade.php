@extends('layouts.app')
   
@section('content')
    
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
            <img src="/image/{{ $product->image }}" width="100px" height="100px">
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Fiyat: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Sepete Ekle</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
    
@endsection