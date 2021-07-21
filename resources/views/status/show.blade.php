@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Durum Göster</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('status.index') }}"> Geri</a>
        </div>
    </div>
</div>



<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>name</th>
    </tr>
    <tr>
        <td>{{ $status->id }}</td>
        <td>{{ $status->name }}</td>
    </tr>


</table>

@endsection