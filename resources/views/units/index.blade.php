@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Birimler</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('units.create') }}"> Yeni Ürün Ekle</a>
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
	    @foreach ($units as $unit) 
	    <tr>
	        <td>{{ $unit->id }}</td>
	        <td>{{ $unit->name }}</td>
	        <td>
                <form action="{{ route('units.destroy',$unit->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('units.show',$unit->id) }}">Göster</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('units.edit',$unit->id) }}">Düzenle</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('unit-delete')
                    <button type="submit" class="btn btn-danger">Sil</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
@endsection