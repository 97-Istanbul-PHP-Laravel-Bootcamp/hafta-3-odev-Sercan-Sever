@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
@endsection

@php
    $title = 'Admin - Kategori Düzenleme';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Kategori Düzenleme';
@endphp


@section('title', $title)


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

@section('header', 'Kategori Düzenleme')

@section('content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.category.list') }}" class="btn btn-outline-primary me-1 mb-1"><strong>Geri Dön</strong></a>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger text-center" role="alert">
                                        <strong> {{ $error }} </strong>
                                    </div>
                                @endforeach
                            </ul>
                        @endif

                        @if (session()->has('status'))
                            <ul>
                                <div class="alert alert-success text-center" role="alert">
                                    <strong> {{ session('status') }} </strong>
                                </div>
                            </ul>
                        @endif

                        <div class="card-body">
                            <form class="form" action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"><strong>Kategori Ad</strong></label>
                                            <input type="text" id="first-name-column" value="{{ $category->title }}" class="form-control" placeholder="Kategori Ad" name="catName">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"><strong>Kategori Seo Ad</strong></label>
                                            <input type="text" id="last-name-column" value="{{ $category->slug }}" class="form-control" placeholder="kategori-seo-ad" name="catSeoAd">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="productTextarea" class="form-label"><strong>Ürün Açıklaması</strong></label>
                                            <textarea class="form-control" id="productTextarea" name="catDescription" rows="5" placeholder="Ürün Açıklamasını Giriniz...">{{ $category->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="basicSelect"><strong>Durum</strong></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="catStatus">
                                                    <option value="a" @if ($category->status == 'a') selected @endif>Aktif</option>
                                                    <option value="p" @if ($category->status == 'p') selected @endif>Pasif</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Düzenle <i class="bi bi-patch-check-fill"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
