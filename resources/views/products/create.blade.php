@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Yeni Ürün Ekle</h2>
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


    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>İsim:</strong>
		            <input type="text" name="name" class="form-control" placeholder="İsim">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detay:</strong>
		            <textarea class="form-control" style="height:100px" name="detail" placeholder="Detay"></textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>İsim:</strong>
                <input type="file" name="image" class="form-control" placeholder="resim">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Fiyat:</strong>
		            <input type="text" name="price" class="form-control" placeholder="fiyat">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Stok:</strong>
		            <input type="text" name="stock" class="form-control" placeholder="stok">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Kategori:</strong>
                       <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
           		 </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Marka:</strong>
                    <select name="brand_id" class="form-control">
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Birim:</strong>
                    <select name="unit_id" class="form-control">
                        @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>Etiket:</strong>
                    <select name="tag_id" class="form-control">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
               		<strong>İade Edilebilirlik:</strong>
                    <select name="refundable_id" class="form-control">
                        @foreach ($refundables as $refundable)
                        <option value="{{ $refundable->id }}">{{ $refundable->name }}</option>
                        @endforeach
                    </select>
           		 </div>
		    </div>
			
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Ekle</button>
		    </div>
		</div>


    </form>

@endsection