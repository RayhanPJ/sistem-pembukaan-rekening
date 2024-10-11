<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('pageTitle')</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/template/assets/img/favicon/favicon-1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    {{-- page CSS --}}
    <link rel="stylesheet" href="{{ asset('/template/assets/vendor/css/pages/page-profile.css') }}" />

    {{-- my CSS --}}
    <link rel="stylesheet" href="{{ asset('/template/assets/css/style.css') }}">

    <!-- Helpers -->
    <script src="{{ asset('/template/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('/template/assets/js/config.js') }}"></script>


</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @yield('sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @yield('navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1">
                        {{-- <div class="row"> --}}
                        <!-- Main Content -->
                        @yield('mainContent')

                        <!-- Footer -->
                        @yield('footer')

                        <div class="content-backdrop fade"></div>
                        {{-- </div> --}}
                    </div>
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>

                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/template/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('/template/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/template/assets/vendor/libs/masonry/masonry.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('/template/assets/vendor/libs/datatables-fixedColumns-bs5/fixedColumns.bootstrap5.js') }}">
    </script>

    <!-- Main JS -->
    <script src="{{ asset('/template/assets/js/main.js') }}"></script>

    <script src="{{ asset('/template/assets/js/script.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- dataTable -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('getUsers.admin') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);

                    const table = $("#listUsers").DataTable({
                        data: response.data,
                        paging: true,
                        searching: true,
                        columns: [{
                                data: null,
                                render: function(data, type, row, meta) {
                                    return meta.row + 1;
                                }
                            }, // Kolom Nomor Urut
                            {
                                data: "name"
                            }, // Nama User
                            {
                                data: "email"
                            }, // Email User
                            {
                                data: "role"
                            }, // Role User
                            {
                                data: "created_at",
                                render: function(data) {
                                    return moment(data).format(
                                        'DD MMM YYYY'); // Format tanggal Created At
                                }
                            },
                            {
                                data: "updated_at",
                                render: function(data) {
                                    return moment(data).format(
                                        'DD MMM YYYY'); // Format tanggal Updated At
                                }
                            },
                            {
                                data: "email_verified_at",
                                render: function(data) {
                                    if (data != null) {
                                        return '<span class="badge badge-sm rounded-pill bg-label-success">Disetujui</span>';
                                    } else {
                                        return '<span class="badge badge-sm rounded-pill bg-label-warning">Menunggu</span>';
                                    }
                                }
                            },
                            {
                                render: function(data, type, row) {
                                    if (row.email_verified_at == null) {
                                        return `
                                <form action="/approve-data-user/${row.id}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm">
                                        Verify <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                </form>`;
                                    } else {
                                        return `
                                <form action="/delete-data-user/${row.id}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        Delete <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </form>`;
                                    }
                                }
                            }
                        ]
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('getNasabah.cs') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    const authUserRole = "{{ auth()->user()->role }}"
                    console.log(response);
                    

                    const table = $("#listNasabah").DataTable({
                        data: response.data,
                        paging: true,
                        searching: true,
                        columns: [{
                                data: null,
                                render: function(data, type, row, meta) {
                                    return meta.row + 1; // Kolom Nomor Urut
                                }
                            }, // Nomor Urut
                            {
                                data: "nama"
                            }, // Nama Nasabah
                            {
                                data: "tempat_lahir"
                            }, // Tempat Lahir
                            {
                                data: "tanggal_lahir",
                                render: function(data) {
                                    return moment(data).format(
                                        'DD MMM YYYY'); // Format tanggal Lahir
                                }
                            },
                            {
                                data: "jenis_kelamin"
                            }, // Jenis Kelamin
                            {
                                data: "pekerjaan.nama_pekerjaan"
                            }, // Pekerjaan
                            {
                                data: null,
                                render: function(data, type, row) {
                                    return `${row.nama_jalan}, RT ${row.rt} / RW ${row.rw}, ${row.kelurahan}, ${row.kecamatan}, ${row.kabupaten_kota}, ${row.provinsi}`;
                                }
                            }, // Alamat
                            {
                                data: "nominal_setor",
                                render: function(data) {
                                    return `Rp${data.toLocaleString('id-ID')}`; // Format nominal setor
                                }
                            },
                            {
                                data: "approval",
                                render: function(data) {
                                    return data === 'approved' ?
                                        '<span class="badge badge-sm rounded-pill bg-label-success">Disetujui</span>' :
                                        '<span class="badge badge-sm rounded-pill bg-label-warning">Menunggu</span>';
                                }
                            },
                            {
                                render: function(data, type, row) {
                                    let buttons = '';

                                    // Hanya render action jika authUserRole bukan 'cs'
                                    if (authUserRole !== 'cs') {
                                        if (row.approval === 'review' && (
                                                authUserRole === 'supervisi' ||
                                                authUserRole === 'admin')) {
                                            buttons += `
                                            <form action="/approve-data-nasabah/${row.id}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-sm">
                                                    Approve <i class="fa-solid fa-circle-check"></i>
                                                </button>
                                            </form>`;
                                        }
                                        if (row.approval === 'approved' &&
                                            authUserRole === 'admin') {
                                            buttons += `
                                            <form action="/cancel-data-nasabah/${row.id}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-warning btn-sm">
                                                    Cancel <i class="fa-solid fa-circle-xmark"></i>
                                                </button>
                                            </form>`;
                                        }
                                    } else {
                                        buttons +=  `-`
                                    }

                                    return buttons;
                                }
                            }

                        ]
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        });
    </script>

    <!-- Regions -->
    <script>
        $(document).ready(function() {
            // Initialize select2 on all selects
            $('.select2').select2({
                placeholder: "Pilih",
                allowClear: true
            });

            // Load provinces
            $.ajax({
                url: "{{ route('getProvinces') }}",
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        var provinces = response.data;
                        var provinceSelect = $('#provinceSelect'); // Your select input for provinces

                        // Clear existing options
                        provinceSelect.empty();

                        // Add default option
                        provinceSelect.append('<option value="">--Select Province--</option>');

                        // Populate select with provinces
                        $.each(provinces, function(index, province) {
                            provinceSelect.append('<option data-id="' + province.id + '">' +
                                province.name + '</option>');
                        });

                        // Reinitialize Select2 after adding options
                        provinceSelect.trigger('change');
                    }
                },
            });

            // Load kabupaten when province is selected
            $('#provinceSelect').on('change', function() {
                let provinceId = $('#provinceSelect option:selected').data(
                    'id'); // Get the data-id attribute
                let kabupatenSelect = $('#kabupatenSelect'); // Your select input for kabupaten/kota
                let kecamatanSelect = $('#kecamatanSelect'); // Your select input for kecamatan
                let kelurahanSelect = $('#kelurahanSelect'); // Your select input for kelurahan

                // Clear kabupaten, kecamatan, and kelurahan selects
                kabupatenSelect.empty().append('<option value="">--Select Kabupaten/Kota--</option>');
                kecamatanSelect.empty().append('<option value="">--Select Kecamatan--</option>');
                kelurahanSelect.empty().append('<option value="">--Select Kelurahan--</option>');

                if (provinceId) {
                    $.ajax({
                        url: "{{ url('getRegencies') }}" + '/' + provinceId,
                        method: 'GET',
                        success: function(response) {
                            if (response.status === 'success') {
                                $.each(response.data, function(index, kabupaten) {
                                    kabupatenSelect.append('<option data-id="' +
                                        kabupaten.id + '">' + kabupaten.name +
                                        '</option>');
                                });
                                kabupatenSelect.trigger(
                                    'change'); // Trigger kabupaten change event
                            }
                        }
                    });
                }
            });

            // Load kecamatan when kabupaten is selected
            $('#kabupatenSelect').on('change', function() {
                let kabupatenId = $('#kabupatenSelect option:selected').data(
                    'id'); // Get the data-id attribute
                let kecamatanSelect = $('#kecamatanSelect');
                let kelurahanSelect = $('#kelurahanSelect');

                // Clear kecamatan and kelurahan selects
                kecamatanSelect.empty().append('<option value="">--Select Kecamatan--</option>');
                kelurahanSelect.empty().append('<option value="">--Select Kelurahan--</option>');

                if (kabupatenId) {
                    $.ajax({
                        url: "{{ url('getDistrict') }}" + '/' + kabupatenId,
                        method: 'GET',
                        success: function(response) {
                            if (response.status === 'success') {
                                $.each(response.data, function(index, kecamatan) {
                                    kecamatanSelect.append('<option data-id="' +
                                        kecamatan.id + '">' + kecamatan.name +
                                        '</option>');
                                });
                                kecamatanSelect.trigger('change');
                            }
                        }
                    });
                }
            });

            // Load kelurahan when kecamatan is selected
            $('#kecamatanSelect').on('change', function() {
                let kecamatanId = $('#kecamatanSelect option:selected').data(
                    'id'); // Get the data-id attribute
                let kelurahanSelect = $('#kelurahanSelect');

                // Clear kelurahan select
                kelurahanSelect.empty().append('<option value="">--Select Kelurahan--</option>');

                if (kecamatanId) {
                    $.ajax({
                        url: "{{ url('getVillages') }}" + '/' + kecamatanId,
                        method: 'GET',
                        success: function(response) {
                            if (response.status === 'success') {
                                $.each(response.data, function(index, kelurahan) {
                                    kelurahanSelect.append('<option data-id="' +
                                        kelurahan.id + '">' + kelurahan.name +
                                        '</option>');
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>

    <!-- Pekerjaan -->
    <script>
        $(document).ready(function() {
            // Initialize select2 on all selects
            $('.select2').select2({
                placeholder: "Pilih",
                allowClear: true
            });

            // Load pekerjaan
            $.ajax({
                url: "{{ route('getPekerjaan') }}",
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        var pekerjaan = response.data;
                        // console.log(pekerjaan);

                        var pekerjaanSelect = $('#pekerjaan'); // Your select input for pekerjaan

                        // Clear existing options
                        pekerjaanSelect.empty();

                        // Add default option
                        pekerjaanSelect.append('<option value="">--Select Pekerjaan--</option>');

                        // Populate select with pekerjaan
                        $.each(pekerjaan, function(index, pekerjaan) {
                            pekerjaanSelect.append('<option value="' + pekerjaan.id + '">' +
                                pekerjaan.nama_pekerjaan + '</option>');
                        });

                        // Reinitialize Select2 after adding options
                        pekerjaanSelect.trigger('change');
                    }
                },
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize select2 on all selects
            $('.select2').select2({
                placeholder: "Pilih",
                allowClear: true
            });

            // Load cabang
            $.ajax({
                url: "{{ route('getCabang') }}", // Sesuaikan route dengan yang benar
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        var cabang = response.data;
                        var cabangSelect = $('#cabang'); // Input select untuk cabang

                        // Kosongkan opsi yang ada
                        cabangSelect.empty();

                        // Tambahkan opsi default
                        cabangSelect.append('<option value="">--Select Cabang--</option>');

                        // Filter hanya cabang yang statusnya 'open'
                        var openCabang = cabang.filter(function(cabangItem) {
                            return cabangItem.status === 'open';
                        });

                        // Populate select dengan cabang yang statusnya 'open'
                        $.each(openCabang, function(index, cabangItem) {
                            cabangSelect.append('<option value="' + cabangItem.id + '">' +
                                cabangItem.nama_cabang + '</option>');
                        });

                        // Reinitialize Select2 atau trigger perubahan
                        cabangSelect.trigger('change');
                    }
                },
            });
        });
    </script>

</body>

</html>
