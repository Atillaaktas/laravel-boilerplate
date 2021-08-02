@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Kullanıcıyı Göster</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Geri </a>
        </div>
    </div>
</div>
<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Resim</th>
   <th>İsim</th>
   <th>Email</th>
   <th>Rol</th>
 </tr>
 <tr>
    <td>{{ $user->id }}</td>
    <td><img src="/image/{{ $user->image }}" width="100px" height="100px"></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>@if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
    </td>

    </tr>


</table>
@endsection