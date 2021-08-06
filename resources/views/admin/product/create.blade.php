@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/choices.js/choices.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filepond-plugin-image-preview.css') }}" rel="stylesheet">
@endsection

@php
    $title = 'Admin - Ürün Ekleme';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Ürün Ekleme';
@endphp


@section('title', $title)


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection


@section('header', 'Ürün Ekleme')


@section('content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.product.list') }}" class="btn btn-outline-primary me-1 mb-1"><strong>Geri Dön</strong></a>
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

                        <div class="card-body">
                            <form class="form" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="product-name"><strong>Ürün Adı</strong></label>
                                            <input type="text" class="form-control" value="{{ old('prodName') }}" name="prodName" placeholder="Ürün Adı">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="product-code"><strong>Ürün Seo Ad</strong></label>
                                            <input type="text" class="form-control" value="{{ old('prodSeo') }}" name="prodSeo" placeholder="/urun-seo-ad şeklinde yazınız...">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="product-code"><strong>Ürün Sırası</strong></label>
                                            <input type="number" class="form-control" value="{{ old('prodOrder') }}" name="prodOrder" placeholder="Ürün Sırası">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="product-code"><strong>Stok Numarası</strong></label>
                                            <input type="text" class="form-control" value="{{ old('prodNumber') }}" name="prodNumber" placeholder="Stok Numarası">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="productTextarea" class="form-label"><strong>Ürün Açıklaması</strong></label>
                                            <textarea class="form-control" rows="5" name="prodDescription" placeholder="Ürün Açıklamasını Giriniz...">{{ old('prodDescription') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="basicSelect"><strong>Ürün Kur Bilgisi</strong></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="prodRate">
                                                    <option value="1" @if (old('prodRate') == '1') selected @endif>TL</option>
                                                    <option value="2" @if (old('prodRate') == '2') selected @endif>Dolar</option>
                                                    <option value="3" @if (old('prodRate') == '3') selected @endif>Euro</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="product-price"><strong>Ürün Fiyat</strong></label>
                                            <input type="number" min="1" value="{{ old('prodPrice') }}" class="form-control" name="prodPrice" placeholder="Ürün Fiyatı">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="basicSelect"><strong>Kategori</strong></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="prodCategory">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @if (old('prodCategory') == $category->id) selected @endif>{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="basicSelect"><strong>Kullanıcı</strong></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="prodUser">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" @if (old('prodUser') == $user->id) selected @endif>{{ $user->fname }} {{ $user->lname }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="basicSelect"><strong>Durum</strong></label>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="prodStatus">
                                                    <option value="a" @if (old('prodStatus') == 'a') selected @endif>Aktif</option>
                                                    <option value="p" @if (old('prodStatus') == 'p') selected @endif>Pasif</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Kaydet <i class="bi bi-patch-check-fill"></i></button>
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
