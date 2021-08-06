@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Ürün Listesi';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Ürün Listesi';
@endphp

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection


@section('header', 'Ürün Listesi')

@section('content')
    <div class="col-12 d-flex justify-content-start">
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary me-1 mb-1"><i class="bi bi-plus-circle"></i> Ürün Ekle</a>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Adı</th>
                            <th class="text-center">URL</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Sırası</th>
                            <th class="text-center">Stok Numarası</th>
                            <th class="text-center">Açıklaması</th>
                            <th class="text-center">Fiyat</th>
                            <th class="text-center">Ekleyen Kullanıcı</th>
                            <th class="text-center">Ekleme Tarihi</th>
                            <th class="text-center">Güncelleme Tarihi</th>
                            <th class="text-center">Durum</th>
                            <th class="text-center">Eylem</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->categoryName() }}</td>
                                <td>{{ $product->order }}</td>
                                <td>{{ $product->unicode }}</td>
                                <td>{{ mb_substr($product->description, 0, 90, 'UTF-8')}} ...</td>
                                <td>{{ $product->prc }} {!! $product->rateCode() !!}</td>
                                <td>{{ $product->userName() }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td class="col-md-1">
                                    {!! $product->statusCode() !!}
                                </td>
                                <td class="col-md-1">
                                    <div class="row">
                                        <div class="col-md-6"> <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a></div>
                                        <div class="col-md-6"><a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a></div>
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
