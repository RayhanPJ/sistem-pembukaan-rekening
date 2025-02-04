@extends('loginTemplate')

@section('pageTitle')
    Login
@endsection

@section('authPage')
    <div class="authentication-wrapper authentication-cover authentication-bg"
        style="background-image: url('{{ asset('/template/assets/img/backgrounds/bg-login.jpg') }}'); background-size: cover; height: 100vh;">
        <div class="authentication-inner row">
            <!-- Login -->
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center"
                style="width: 500px; height: 500px; margin: auto;">
                <div class="w-px-400 mx-auto">
                    <div class="row">
                        <div class="col text-center">
                            <h3 class="mb-1 fw-bold">Sistem Pembukaan Rekening</h3>
                            {{-- regist berhasil --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <b> {{ session('success') }} </b>
                                </div>
                            @endif

                            <p class="mb-4">Silakan masuk ke akun Anda</p>

                            {{-- login gagal --}}
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <b>Opps!</b> {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <form id="formAuthentication" class="mb-3" action="{{ route('postlogin') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Masukkan email" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer" id="togglePassword">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-twitter d-grid w-100">Masuk</button>
                    </form>

                    {{-- <p class="text-center">
                        <span>Belum punya akun?</span>
                        <a href="{{ route('regist') }}">
                            <span>Daftar akun</span>
                        </a>
                    </p> --}}
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
@endsection
