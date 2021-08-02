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
      
        
            <form action="{{ route('products.index') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <a class="btn btn-warning" href="{{ route('export') }}">Export Product Data</a>
            </form>
        
    </div>
    </div>

    <table class="table table-bordered data-table">
        <tr>
            <th>No</th>
            <th>Resim</th>
            <th>İsim</th>
            <th>Detay</th>
            <th>Fiyat</th>
            <th>En</th>
            <th>Boy</th>
            <th>Yükseklik</th>
            <th>Kilogram</th>
            <th>Desi</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Marka</th>
            <th>Birim</th>
            <th>Etiket</th>
            <th>İade Edilebilirlik</th>
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
        ajax: "{{ route('products.index') }}",
        columns: [  
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'price', name: 'price'},
            {data: 'width', name: 'width'},
            {data: 'height', name: 'height'},
            {data: 'weight', name: 'weight'},
            {data: 'kg', name: 'kg'},
            {data: 'deci', name: 'deci'},
            {data: 'stock', name: 'stock'},
            {data: 'category_name', name: 'category_name'},
            {data: 'brand_name', name: 'brand_name'},
            {data: 'unit_name', name: 'unit_name'},
            {data: 'tag_name', name: 'tag_name'},
            {data: 'refundable_name', name: 'refundable_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
           
	    
	    
        ]
        

          
    });
    
  });
</script>
@endsection