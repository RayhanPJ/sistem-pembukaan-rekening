@extends('template');

@section('pageTitle')
    Regsiter
@endsection

@section('mainContent')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Regsiter</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <b> {{ session('success') }} </b>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{ session('error') }}
                </div>
            @endif

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="formAuthentication" class="mb-3" action="{{ route('postRegist') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan nama lengkap" autofocus />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cabang">Cabang <small class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select name="cabang_id" id="cabang" class="select2 form-select form-select-sm">
                                <option value="">--Select Cabang--</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="role">Role <small class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select name="role" id="role" class="select2 form-select form-select-sm">
                                <option value="">--Select Role--</option>
                                <option value="cs">Costumer Service</option>
                                <option value="supervisi">Supervisi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer" id="togglePassword">
                                <i class="ti ti-eye-off"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-twitter d-grid w-100">Daftar</button>
                </form>

            </div>
        </div>
    </div>


@endsection
