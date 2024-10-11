@extends('template');

@section('sidebar')
    <!-- Menu -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="/" class="app-brand-link">
                <img src="{{ asset('/template/assets/img/branding/e-letter-logo.png') }}" alt="E-Letter" width="180"
                    height="85">
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }} open">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('formNasabah.cs') }}" class="menu-link">
                            <div data-i18n="Form Pembukaan Rekening">Form Pembukaan Rek</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('listNasabah.cs') }}" class="menu-link">
                            <div data-i18n="Form Pembukaan Rekening">List Pembukaan Rek</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Master Data -->
            @if (auth()->user()->role === 'admin')
                <li class="menu-item {{ request()->routeIs('master') ? 'active' : '' }} open">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Master">Master</div>
                    </a>
                    <ul class="menu-sub">
                        
                        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('listUsers.admin') }}" class="menu-link">
                                <div data-i18n="Form Pembukaan Rekening">List Users</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('regist') }}" class="menu-link">
                                <div data-i18n="Form Pembukaan Rekening">Form New User</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('regist') }}" class="menu-link">
                                <div data-i18n="Form Pembukaan Rekening">Form Cabang</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('regist') }}" class="menu-link">
                                <div data-i18n="Form Pembukaan Rekening">Form Pekerjaan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <div data-i18n="Riwayat Surat">Region</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('regist') }}" class="menu-link">
                                        <div data-i18n="Form Pembukaan Rekening">Form Provinsi</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('regist') }}" class="menu-link">
                                        <div data-i18n="Form Pembukaan Rekening">Form Kabupaten/Kota</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('regist') }}" class="menu-link">
                                        <div data-i18n="Form Pembukaan Rekening">Form Kecamatan</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('regist') }}" class="menu-link">
                                        <div data-i18n="Form Pembukaan Rekening">Form Kelurahan </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
    <!-- / Menu -->
@endsection
