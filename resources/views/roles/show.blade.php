@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Rolleri Göster</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Geri </a>
        </div>
    </div>
</div>




<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>İsim</th>
        <th>İzin</th>
    </tr>
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->İsim }}</td>
        <td>

            @if(!empty($rolePermissions))
            @foreach($rolePermissions as $v)
            <label class="label label-success">{{ $v->name }},</label>
            @endforeach
            @endif

        </td>
    </tr>


</table>
@endsection