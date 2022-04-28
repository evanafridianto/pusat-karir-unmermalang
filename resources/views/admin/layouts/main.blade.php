<!DOCTYPE html>
<html lang="en">

@section('head')
    @include('admin.layouts.head')
@show

<body>
    <!-- ########## START: LEFT PANEL ########## -->
    {{-- <div class="br-logo"><span></span>Pusat <i>Karir</i><span></span></a></div> --}}
    <a href="">
        <div class="br-logo"><img src="{{ asset('user/assets/img/logos/pusat-karir.svg') }}" width="120"
                alt="Logo"></div>
    </a>
    @section('sidebar')
        @include('admin.layouts.sidebar')
    @show
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @section('header')
        @include('admin.layouts.header')
    @show
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        @if (Request::route()->getName() == 'admin.dashboard')
            <div class="br-pagetitle">
                <h4>{{ $title }}</h4>
            </div>
        @endif
        @yield('content')
        @section('footer')
            @include('admin.layouts.footer')
        @show
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <!-- BASIC MODAL -->
    <div id="accountModal" class="modal fade" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title-form-category">Edit Akun
                    </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pd-25">
                    <form id="accountForm">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="hidden" name="account_id">
                                <input type="text" name="email" class="form-control" autofocus
                                    placeholder="Masukkan email">
                                <small class="text-danger"></small>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control"
                                    placeholder="Masukkan username">
                                <small class="text-danger"></small>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan password">
                                <small class="text-danger"></small>
                            </div><!-- form-group -->
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Konfirmasi password">
                                <small class="text-danger"></small>
                            </div><!-- form-group -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        onclick="account_store()" id="btn-spinner3"><i
                            class="fa fa-paper-plane mg-r-10"></i>Simpan</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    @section('javascript')
        <script src="{{ asset('app/main.js') }}"></script>
        @include('admin.layouts.javascript')
    @show


</body>

</html>
