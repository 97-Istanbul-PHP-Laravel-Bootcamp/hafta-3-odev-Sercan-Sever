@extends('layout.admin')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
@endsection

@php
    $title = 'Admin - Kullanıcı Düzenleme';
    $breadTitle = 'Anasayfa';
    $breadSubTitle = 'Kullanıcı Düzenleme';
@endphp

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">{{ $breadTitle }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $breadSubTitle }}</li>
@endsection

@section('header', 'Kullanıcı Düzenleme')

@section('content')
    <div class="col-12 d-flex justify-content-end">
        <a href="{{ route('admin.user.list') }}" class="btn btn-outline-primary me-1 mb-1"><strong>Geri Dön</strong></a>
    </div>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-6 col-12">
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
                            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" class="form form-vertical" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon"><strong>Kullanıcı Adı *</strong></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="userName" id="first-name-icon" value="{{ $user->uname }}" placeholder="Kullanıcı Adınız *">
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
                                                    <input type="password" class="form-control" name="userPassword" id="password-id-icon" value="{{ $user->pass }}" placeholder="Şifreniz *">
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
                                                    <input type="text" class="form-control" name="usName" id="first-name-icon" value="{{ $user->fname }}" placeholder="Adınız *">
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
                                                    <input type="text" class="form-control" name="usLastName" id="first-name-icon" value="{{ $user->lname }}" placeholder="Soyadınız *">
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
                                                    <input type="number" class="form-control" name="usPhone" id="mobile-id-icon" value="{{ $user->mpno }}" placeholder="Telefon Numaranız *">
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
                                                    <input type="text" class="form-control" name="usMail" id="email-id-icon" value="{{ $user->mail }}" placeholder="E-Posta Hesabınız *">
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
                                                        <option value="a" @if ($user->status == 'a') selected @endif>Aktif</option>
                                                        <option value="p" @if ($user->status == 'p') selected @endif>Pasif</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr><br>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Güncelle <i class="bi bi-patch-check-fill"></i></button>
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
