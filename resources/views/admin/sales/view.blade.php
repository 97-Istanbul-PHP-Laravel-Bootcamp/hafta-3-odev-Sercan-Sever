@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Satış Detay';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Satış Detay';
@endphp

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

{{-- @section('header', 'Satış Detay') --}}

@section('content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.sales.list') }}" class="btn btn-outline-primary me-1 mb-1"><strong>Geri Dön</strong></a>
    </div>
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sipariş Özeti</h4>
                    </div>
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Sipariş Kodu</strong></td>
                                        <td>{{ $sale->orid }}</td>
                                        {{-- *********************************************** --}}
                                        <td><strong>Ödeme Tipi</strong></td>
                                        <td>Kredi Kartı</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alıcı Bilgisi</strong></td>
                                        <td>{{ $sale->userName() }}</td>
                                        {{-- *********************************************** --}}
                                        <td><strong>KDV Hariç Tutar</strong></td>
                                        <td><strong>{{ $sale->prc }} {{ $sale->rateCode() }}</strong></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td><strong>Adres Bilgisi</strong></td>
                                        <td>Adres Mah. Bilgi Cad. No 20 Bayındır/İzmir</td>
                                        {{-- *********************************************** --}}
                                        <td><strong>KDV Tutar</strong></td>
                                        <td><strong><strong>{{ $sale->prc }} {{ $sale->rateCode() }}</strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tarih</strong></td>
                                        <td>{{ $sale->sale_date }}</td>
                                        {{-- *********************************************** --}}
                                        <td><strong>Ödenen Tutar</strong></td>
                                        <td><strong>{{ $sale->prc }} {{ $sale->rateCode() }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kargo Bilgisi</strong></td>
                                        <td><strong>Kargoda</strong></td>
                                        {{-- *********************************************** --}}
                                        <td><strong>Ödeme Durumu</strong></td>
                                        <td><strong>Ödendi</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sipariş Verilen Ürünler</h4>
                    </div>
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Resim</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Kodu</th>
                                        <th>Açıklama</th>
                                        <th>Ürün Fiyat</th>
                                        <th>Aded</th>
                                        <th>Toplam Tutar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sale->products() as $product)
                                    <tr>
                                        <td>
                                            <h1><i class="bi bi-bag-check-fill"></i></h1>
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->unicode }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->prc }} {{ $product->rateCode() }}</td>
                                        <td>1</td>
                                        <td><strong>{{ $product->prc }} {{ $product->rateCode() }}</strong></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
