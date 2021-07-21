@extends('layouts.app')

@section('content')
<x-alert type="success" title="başlık" message="mesaj" />
<x-alert type="danger" title="başlık" message="mesaj" />
<x-alert type="secondary" title="başlık" message="mesaj" />
<x-alert type="info" title="başlık" message="mesaj" />
<x-alert type="dark" title="başlık" message="mesaj" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gösterge Paneli') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Giriş Yaptınız!') }}
                </div>
            </div>
        </div>
    </div>
</div>





<table class="table table-bordered">
    <tr>
        <th>
        Toplam Kullanıcı
        </th>
        <td>
        {{ $users }}
        </td>
    </tr>
    <tr>
        <th>
        Toplam Ürün
        </th>
        <td>
        {{ $products }}
        </td>
    </tr>
    <tr>
        <th>
        Toplam Sipariş
        </th>
        <td>
        {{ $orders }}
        </td>
    </tr>
    <tr>
        <th>
        Günlük Satış
        </th>
        <td>
        {{ $todayOrderCount }}
        </td>
    </tr>
    <tr>
        <th>
        Haftalık Satış
        </th>
        <td>
        {{ $weekOrderCount }}
        </td>
    </tr>
    <tr>
        <th>
        Aylık Satış
        </th>
        <td>
        {{ $monthOrderCount }}
        </td>
    </tr>
    <tr>
        <th>
        Yıllık Satış
        </th>
        <td>
        {{ $yearOrderCount }}
        </td>
    </tr>
    <tr>
        <th>
       Ürün(çok satan aylık)
        </th>
        <td>
            <pre>
            {{ var_dump($bestSellingThisMonth ) }}
            </pre>
        </td>
    </tr>
    <tr>
        <th>
       Ürün(çok satan yıllık)
        </th>
        <td>
            <pre>
            {{ var_dump($bestSellingThisYear ) }}
            </pre>
        </td>
    </tr>
    <tr>
        <th>
       Kategori(çok satan aylık)
        </th>
        <td>
            <pre>
            {{ var_dump($bestSellingCategoryThisMonth ) }}
            </pre>
        </td>
    </tr>
    <tr>
        <th>
       Kategori(çok satan yıllık)
        </th>
        <td>
            <pre>
            {{ var_dump($bestSellingCategoryThisYear ) }}
            </pre>
        </td>
    </tr>
    <tr>
        <th>
       Marka(çok satan aylık)
        </th>
        <td>
            <pre>
            {{ var_dump($bestSellingBrandThisMonth ) }}
            </pre>
        </td>
    </tr>
    <tr>
        <th>
        Müşteri(haftalık kayıt)
        </th>
        <td>
           
            {{ $weekCustomerCount  }}
            
        </td>
    </tr>
    <tr>
        <th>
        Müşteri(aylık kayıt)
        </th>
        <td>
           
            {{ $monthCustomerCount  }}
           
        </td>
    </tr>
    
</table>
@endsection