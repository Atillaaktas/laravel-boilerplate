@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Markalar</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('brands.create') }}"> Yeni Marka Ekle</a>
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
	    @foreach ($brands as $brand) 
	    <tr>
	        <td>{{ $brand->id }}</td>
	        <td>{{ $brand->name }}</td>
	        <td>
                <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('brands.show',$brand->id) }}">Göster</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Düzenle</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('brand-delete')
                    <button type="submit" class="btn btn-danger">Sil</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>







@endsection