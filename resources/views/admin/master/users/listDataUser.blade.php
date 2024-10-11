@extends('template')

@section('pageTitle')
    List Data User
@endsection

@section('mainContent')
    <div class="col-xl">

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    <b> {{ session('success') }} </b>
                </div>
            @endif
            <div class="col-md-5">
                <div class="alert alert-info position-relative" role="alert">
                    <h4 class="alert-heading">Informasi!</h4>
                    <p>Berikut ini adalah daftar user yang telah terdaftar.</p>
                    <button type="button" class="btn-close position-absolute top-0 end-0" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

        <!-- Column Search -->
        <div class="card">
            <h5 class="card-header">Data User</h5>
            <div class="card-datatable table-responsive pt-0">
                <table id="listUsers" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Column Search -->
    </div>
@endsection
