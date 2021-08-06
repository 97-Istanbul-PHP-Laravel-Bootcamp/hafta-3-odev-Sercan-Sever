@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Kategori Listesi';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Kategori Listesi';
@endphp


@section('title', $title)


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

@section('header', 'Kategori Listesi')

@section('content')
    <div class="col-12 d-flex justify-content-start">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary me-1 mb-1"><i class="bi bi-plus-circle"></i> Kategori Ekle</a>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Başlık</th>
                            <th class="text-center">Seo Ad</th>
                            <th class="text-center">Açıklama</th>
                            <th class="text-center">Oluşturulma Tarihi</th>
                            <th class="text-center">Güncelleme Tarihi</th>
                            <th class="text-center">Durum</th>
                            <th class="text-center">Eylem</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ mb_substr($category->description, 0, 90, 'UTF-8')}} ...</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td class="col-md-1">
                                {!! $category->statusCode() !!}
                            </td>
                            <td class="col-md-1">
                                <div class="row">
                                    <div class="col-md-6"><a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a></div>
                                    <div class="col-md-6"><a href="{{ route('admin.category.delete', ['id' => $category->id]) }}" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a></div>
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
