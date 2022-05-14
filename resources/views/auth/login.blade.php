    @extends('front.layouts.main')
    @section('content')
        <main id="content" role="main">
            <!-- Hero Section -->
            <div class="container space-2 space-lg-3">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-md-10 col-lg-5 mb-9 mb-lg-0">
                        <div class="mb-7">
                            <h1 class="mb-4">Gabung menjadi member <span class="text-custom">Pusat Karir
                                    Unmer
                                    Malang!</span></h1>
                            <a href="/membership" type=" button" class="btn btn-custom">
                                Gabung Sekarang!
                                <i class="fa-solid fa-users-line ml-1"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Form -->
                        <form class="card border w-md-85 w-lg-100 mx-md-auto" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-6">
                                <h4 class="text-white mb-0">FORM MASUK </h4>
                            </div>
                            <div class="card-body p-md-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Email atau Username</label>
                                            <input type="text" class="form-control form-control-sm" id="login"
                                                value="{{ old('login') }}" name="login" placeholder="Email atau Username"
                                                autofocus>
                                            @error('login')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Password</label>
                                            <input type="password" class="form-control form-control-sm" name="password"
                                                placeholder="Password">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                </div>
                                <!-- Checkbox -->
                                <div class="js-form-message mb-5">
                                    <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                        <label class="custom-control-label" for="remember">
                                            <small>
                                                Remember me?
                                            </small>
                                        </label>
                                    </div>
                                </div>
                                <!-- End Checkbox -->

                                <div class="row align-items-center">
                                    <div class="col-sm-7 mb-3 mb-sm-0">
                                        <p class="font-size-1 text-muted mb-0">Belum punya akun? <a class="font-weight-bold"
                                                href="{{ route('register', 'seeker') }}">Daftar</a></p>
                                    </div>
                                    <div class="col-sm-5 text-sm-right">
                                        <button type="submit" id="btn-Login"
                                            class="btn btn-sm btn-custom transition-3d-hover">Masuk
                                            <i class="fa fa-angle-right fa-sm ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
            <!-- End Hero Section -->
        </main>
        <script src="{{ asset('app/auth/login.js') }}"></script>
    @endsection
