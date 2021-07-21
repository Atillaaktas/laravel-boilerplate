@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ürünler</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Yeni Ürün Ekle</a>
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
            <th>Stok</th>
            <th>Kategori</th>
            <th>Marka</th>
            <th>Birim</th>
            <th>Etiket</th>
            <th>İade Edilebilirlik</th>
            <th width="280px">Aksiyon</th>
        </tr>
	    @foreach ($products as $product) 
	    <tr>
	        <td>{{ $product->id }}</td>
            <td><img src="/image/{{ $product->image }}" width="100px" height="100px"></td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->category_name }}</td>
            <td>{{ $product->brand_name }}</td>
            <td>{{ $product->unit_name }}</td>
            <td>{{ $product->tag_name }}</td>
            <td>{{ $product->refundable_name }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Göster</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Düzenle</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Sil</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    @section('scripts') 
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.index') }}",
        columns: [  
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'price', name: 'price'},
            {data: 'stock', name: 'stock'},
            {data: 'category_name', name: 'category_name'},
            {data: 'brand_name', name: 'brand_name'},
            {data: 'unit_name', name: 'unit_name'},
            {data: 'tag_name', name: 'tag_name'},
            {data: 'refundable_name', name: 'refundable_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          
    });
    
  });
</script>
@endsection


    




@endsection