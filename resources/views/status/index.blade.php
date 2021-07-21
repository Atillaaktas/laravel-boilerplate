@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Durumlar</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('status.create') }}"> Yeni Ürün Ekle</a>
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
	    @foreach ($status as $status) 
	    <tr>
	        <td>{{ $status->id }}</td>
	        <td>{{ $status->name }}</td>
	        <td>
                <form action="{{ route('status.destroy',$status->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('status.show',$status->id) }}">Göster</a>
                    @can('status-edit')
                    <a class="btn btn-primary" href="{{ route('status.edit',$status->id) }}">Düzenle</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('status-delete')
                    <button type="submit" class="btn btn-danger">Sil</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
@endsection