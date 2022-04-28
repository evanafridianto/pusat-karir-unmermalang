    @extends('front.layouts.main')
    @section('content')
        <main id="content" role="main">
            <!-- Article Section -->
            <div class="container space-2 space-lg-3">
                {{-- <div class="row justify-content-lg-between align-items-lg-center"> --}}

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <!-- Jobs Link -->
                        <div class="mb-5">
                            <a href="javascript:void(0)" class="font-weight-bold" onclick="history.back()">
                                <i class="fas fa-angle-left fa-sm mr-1"></i>
                                Kembali
                            </a>
                        </div>
                        <!-- End Jobs Link -->
                        <!-- Form -->
                        <form id="paymentConfirmation" class="card border w-md-85 w-lg-100 mx-md-auto" method="POST">
                            @csrf
                            <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-6">
                                <h4 class="text-white mb-0">KONFIRMASI PEMBAYARAN</h4>
                            </div>
                            <div class="card-body p-md-6">

                                <div class="row">
                                    <input type="hidden" class="form-control form-control-sm" readonly name="user_id"
                                        value="{{ Auth::user()->id }}" placeholder="Pembayar">

                                    <div class="col-sm-12">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Nama Member</label>
                                            @if (Auth::user()->hasRole('employer'))
                                                <input type="text" class="form-control form-control-sm" readonly
                                                    name="company_name" value="{{ Auth::user()->userable->company_name }}"
                                                    placeholder="Nama Member">
                                            @elseif(Auth::user()->hasRole('seeker'))
                                                <input type="text" class="form-control form-control-sm" readonly
                                                    name="first_name"
                                                    value="{{ Auth::user()->userable->first_name . ' ' . Auth::user()->userable->last_name }}"
                                                    placeholder="Nama Member">
                                            @endif
                                            <small class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Jumlah Bayar</label>
                                            <input type="number" placeholder="Jumlah bayar"
                                                class="form-control form-control-sm" name="total_pay">
                                            <small class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Bukti Bayar (image)</label>
                                            <input type="file" class="form-control form-control-sm" name="image"
                                                accept="image/*" />
                                            <small class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                        <img id="logo" class="avatar-img" src="" alt="img" width="120" height="120">
                                    </div>

                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-7 mb-3 mb-sm-0">
                                    </div>
                                    <div class="col-sm-5 text-sm-right">
                                        <button id="btnSave" type="button" onclick="confirmation()"
                                            class="btn btn-sm btn-custom transition-3d-hover">Submit
                                            <i class="fa fa-angle-right fa-sm ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
            <!-- End Article Section -->
        </main>
        <script src="{{ asset('app/membership/confirmation.js') }}"></script>
    @endsection
