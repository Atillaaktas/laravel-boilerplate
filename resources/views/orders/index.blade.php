@extends('layouts.app')

@section('content')
<div class="container">


    <h1>Siparişler Listesi</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kullanıcı_id</th>
                <th>Durum_id</th>
                <th>Aksiyon</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
@section('scripts') 
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('orders') }}",
        columns: [  
            {data: 'id', name: 'id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'status_id', name: 'status_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection


