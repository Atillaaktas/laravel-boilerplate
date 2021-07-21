@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kategoriler</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Yeni Ürün Ekle</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>İsim</th>
            <th width="280px">Aksiyon</th>
        </tr>
	    @foreach ($categories as $category) 
	    <tr>
	        <td>{{ $category->id }}</td>
	        <td>{{ $category->name }}</td>
	        <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Göster</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Düzenle</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Sil</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>







@endsection