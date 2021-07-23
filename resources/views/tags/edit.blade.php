@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Etiketi Düzenle</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tags.index') }}"> Geri</a>
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


    <form action="{{ route('tags.update',$unit->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>İsim:</strong>
		            <input type="text" name="name" value="{{ $unit->name }}" class="form-control" placeholder="isim">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Ekle</button>
            </div>
		</div>
        


    </form>



@endsection


