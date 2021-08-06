@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Satış Listesi';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Satış Listesi';
@endphp

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

@section('header', 'Satış Listesi')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Ürün Adı</th>
                            <th class="text-center">Satın Alan Kullanıcı</th>
                            <th class="text-center">Sipariş Numarası</th>
                            <th class="text-center">Satış Numarası</th>
                            <th class="text-center">Satış Fiyatı</th>
                            <th class="text-center">Satış Kur Bilgisi</th>
                            <th class="text-center">Satış Tarihi</th>
                            <th class="text-center">Oluşturma Tarihi</th>
                            <th class="text-center">Güncelleme Tarihi</th>
                            <th class="text-center">Eylem</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->productName() }}</td>
                            <td>{{ $sale->userName() }}</td>
                            <td>{{ $sale->orid }}</td>
                            <td>{{ $sale->code }}</td>
                            <td>{{ $sale->prc }}</td>
                            <td>{{ $sale->rateCode() }}</td>
                            <td>{{ $sale->sale_date }}</td>
                            <td>{{ $sale->created_at  }}</td>
                            <td>{{ $sale->updated_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6"> <a href="{{ route('admin.sales.show', ['id' => $sale->user_id]) }}" class="btn btn-outline-primary"><i class="bi bi-info-circle-fill"></i></a></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@section('customJS')
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
