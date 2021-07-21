@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ürünü Düzenle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Geri</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Girişinizle ilgili bazı sorunlar vardı.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.update',$product->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>İsim:</strong>
		            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="isim">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detay:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detay">{{ $product->detail }}</textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Resim:</strong>
                    <input type="file" name="image" class="form-control" placeholder="resim">
                    <img src="/image/{{ $product->image }}" width="300px">
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Fiyat:</strong>
		            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Fiyat">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Stok:</strong>
                    <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="Stok">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Kategori:</strong>
                       <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"@if ($category->id == $product->category_id)selected="selected"
    					@endif>{{ $category->name }}</option>
                        @endforeach
                        </select>
           		 </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Marka:</strong>
                    <select name="brand_id" class="form-control">
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"@if ($brand->id == $product->brand_id)selected="selected"
    					@endif>{{ $brand->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Birim:</strong>
                    <select name="unit_id" class="form-control">
                        @foreach ($units as $unit)
                        <option value="{{ $unit->id }}"@if ($unit->id == $product->unit_id)selected="selected"
    					@endif>{{ $unit->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Etiket:</strong>
                    <select name="tag_id" class="form-control">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"@if ($tag->id == $product->tag_id)selected="selected"
    					@endif>{{ $tag->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>İade Edilebilirlik:</strong>
                    <select name="refundable_id" class="form-control">
                         @foreach ($refundables as $refundable)
                        <option value="{{ $refundable->id }}"  @if ($refundable->id == $product->refundable_id)selected="selected"
    					@endif>{{ $refundable->name }}</option>
                        @endforeach
                    </select>
					


           		 </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Ekle</button>
            </div>
		</div>
 

    </form>



@endsection


