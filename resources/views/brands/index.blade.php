

@extends('layouts.app')



@section('content')
<div class="container">


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ürünler</h2>
            </div>
            <div class="pull-right">
                @can('brand-create')
                <a class="btn btn-success" href="{{ route('brands.create') }}"> Yeni Ürün Ekle</a>
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
      
        
            <form action="{{ route('brands.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <a class="btn btn-warning" href="{{ route('export') }}">Export Brand Data</a>
            </form>
        
    </div>
    </div>

    <table class="table table-bordered data-table">
        <tr>
            <th>No</th>
            <th>Resim</th>
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
        ajax: "{{ route('brands.index') }}",
        columns: [  
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
           
	    
	    
        ]
        

          
    });
    
  });
</script>
@endsection