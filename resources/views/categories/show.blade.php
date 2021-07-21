@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Ürünü Göster</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Geri</a>
        </div>
    </div>
</div>



<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>İsim</th>
    </tr>
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
    </tr>


</table>

@endsection