@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Kullanıcı Ekleme';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Kullanıcı Ekleme';
@endphp

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

@section('header', 'Kullanıcı Ekleme')

@section('content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.user.list') }}" class="btn btn-outline-primary me-1 mb-1"><strong>Geri Dön</strong></a>
    </div>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('admin.user.store') }}" class="form form-vertical" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon"><strong>Kullanıcı Adı *</strong></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Kullanıcı Adınız *" value="{{ old('userName') }}" name="userName" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon"><strong>Şifre *</strong></label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Şifreniz *" value="{{ old('userPassword') }}" name="userPassword" id="password-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon"><strong>Adı *</strong></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Adınız *" value="{{ old('usName') }}" name="usName" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon"><strong>Soyadı *</strong></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Soyadınız *" value="{{ old('usLastName') }}" name="usLastName" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon"><strong>Tel No *</strong></label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" placeholder="Telefon Numaranız *" value="{{ old('usPhone') }}" name="usPhone" id="mobile-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon"><strong>E-Posta *</strong></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="E-Posta Hesabınız *" value="{{ old('usMail') }}" name="usMail" id="email-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="basicSelect"><strong>Durum *</strong></label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" name="usStatus">
                                                        <option value="a" @if (old('userStatus') == 'a') selected @endif>Aktif</option>
                                                        <option value="p" @if (old('userStatus') == 'p') selected @endif>Pasif</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr><br>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kaydet <i class="bi bi-patch-check-fill"></i></button>
                                        </div>
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
