@extends('layouts.app')



@section('content')
<div class="container">


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Durumlar</h2>
            </div>
            <div class="pull-right">
                @can('status-create')
                <a class="btn btn-success" href="{{ route('status.create') }}"> Yeni Durum Ekle</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
    <div class="card bg-light mt-3">
      
        
            <form action="{{ route('status.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <a class="btn btn-warning" href="{{ route('export') }}">Export Status Data</a>
            </form>
        
    </div>
    </div>

    <table class="table table-bordered data-table">
        <tr>
            <th>No</th>
            <th>İsim</th>
            <th width="280px">Aksiyon</th>
        </tr>
	    
    </table>
</div>
@endsection
@section('scripts') 
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('status.index') }}",
        columns: [  
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
           
	    
	    
        ]
        

          
    });
    
  });
</script>
@endsection