@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Markayı Göster</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('brands.index') }}"> Geri</a>
            </div>
        </div>
    </div>

   
    

    <table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>isim</th>
    </tr>
    <tr>
        <td>{{ $brand->id }}</td>
        <td>{{ $brand->name }}</td>
    </tr>


</table>

@endsection
