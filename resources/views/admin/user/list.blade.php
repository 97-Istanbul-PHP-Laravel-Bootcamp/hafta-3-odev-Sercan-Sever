@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Kullanıcı Listesi';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Kullanıcı Listesi';
@endphp

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

@section('header', 'Kullanıcı Listesi')

@section('content')
<div class="col-12 d-flex justify-content-start">
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary me-1 mb-1"><i class="bi bi-plus-circle"></i> Kullanıcı Ekle</a>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">Kullanıcı Adı</th>
                        <th class="text-center">E-Posta</th>
                        <th class="text-center">Tel No</th>
                        <th class="text-center">Adı - Soyadı</th>
                        <th class="text-center">Oluşturma Tarihi</th>
                        <th class="text-center">Güncellenme Tarihi</th>
                        <th class="text-center">Durum</th>
                        <th class="text-center">Eylem</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->uname }}</td>
                        <td>{{ $user->mail }}</td>
                        <td>{{ $user->mpno }}</td>
                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="col-md-1">
                            {!! $user->statusCode() !!}
                        </td>
                        <td class="col-md-1">
                            <div class="row">
                                <div class="col-md-6"><a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a></div>
                                <div class="col-md-6"><a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a></div>
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
