@extends('template');

@section('pageTitle')
    Pekerjaan
@endsection

@section('mainContent')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Pekerjaan</h5>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <b> {{ session('success') }} </b>
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

                <form method="post" action="{{ route('inputNasabah.cs') }}" id="formPembukaanRekening">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama sesuai KTP <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="ti ti-user"></i></span>
                            <input type="text" class="form-control alphabet-input" name="nama" id="nama"
                                required />
                        </div>
                        <!-- Error message if validation fails -->
                        <small class="text-danger">Nama tidak boleh mengandung angka, simbol, atau gelar seperti "Profesor"
                            dan "Haji".</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tempat_lahir">Tempat Lahir <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="pekerjaan">Pekerjaan <small class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select name="pekerjaan_id" id="pekerjaan" class="select2 form-select form-select-sm">
                                <option value="">--Select Pekerjaan--</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="provinceSelect">Provinsi <small class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select id="provinceSelect" class="select2 form-select form-select-sm" name="provinsi" required>
                                <option value="">--Select Provinsi--</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kabupatenSelect">Kabupaten/Kota <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select id="kabupatenSelect" class="select2 form-select form-select-sm" name="kabupaten_kota"
                                required>
                                <option value="">--Select Kabupaten/Kota--</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kecamatanSelect">Kecamatan <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select id="kecamatanSelect" class="select2 form-select form-select-sm" name="kecamatan"
                                required>
                                <option value="">--Select Kecamatan--</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kelurahanSelect">Kelurahan <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <select id="kelurahanSelect" class="select2 form-select form-select-sm" name="kelurahan"
                                required>
                                <option value="">--Select Kelurahan--</option>
                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat Detail <small class="text-danger">*</small></label>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" id="nama_jalan" name="nama_jalan" class="form-control mb-2"
                                    placeholder="Nama Jalan" required />
                            </div>
                            <div class="col-4">
                                <input type="text" id="rt" name="rt" class="form-control mb-2"
                                    placeholder="RT" required />
                            </div>
                            <div class="col-4">
                                <input type="text" id="rw" name="rw" class="form-control mb-2"
                                    placeholder="RW" required />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nominal_setor">Nominal Setor <small
                                class="text-danger">*</small></label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="ti ti-currency-dollar"></i></span>
                            <input type="text" id="nominal_setor" name="nominal_setor" class="form-control"
                                required />
                        </div>
                        <small class="text-muted">Format nominal dalam bentuk rupiah, contoh: 1000000</small>
                    </div>

                    <button type="submit" class="btn btn-twitter">Submit</button>
                </form>

            </div>
        </div>
    </div>


@endsection
