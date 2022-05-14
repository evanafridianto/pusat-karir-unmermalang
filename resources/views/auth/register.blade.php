    @extends('front.layouts.main')
    @section('content')
        <main id="content" role="main">
            <!-- Article Section -->
            <div class="container space-2 space-lg-3">
                {{-- <div class="row justify-content-lg-between align-items-lg-center"> --}}
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <!-- Form -->
                        <form id="formRegister" class="js-step-form card border w-md-85 w-lg-100 mx-md-auto"
                            data-hs-step-form-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    "progressSelector": "#basicFormStepFormProgress",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "stepsSelector": "#basicFormStepFormContent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }'>

                            @csrf
                            <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-12">
                                <h4 class="text-white mb-0">{{ strtoupper('Form Daftar ' . $role) }} </h4>
                            </div>
                            <!-- Step -->
                            <!-- End Step -->
                            <div class="card-body p-md-12">
                                @if ($role === 'employer')
                                    <ul id="basicFormStepFormProgress" class="js-step-progress step step-md step-inline">
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">1</span>
                                                <div class="step-content">
                                                    <span>Profil Perusahaan</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">2</span>
                                                <div class="step-content">
                                                    <span>Alamat</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">3</span>
                                                <div class="step-content">
                                                    <span>Akun</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div id="basicFormStepFormContent">
                                        <div id="basicFormSelectStepOne" class="active">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-8">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Nama
                                                            Perusahaan</label>
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            name="role" value="employer">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="company_name" placeholder="Nama Perusahaan" autofocus>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Tahun Berdiri</label>
                                                        <select name="since" class="form-control form-control-sm">
                                                            <option value="">Pilih tahun berdiri</option>
                                                            @for ($x = date('Y'); $x >= 1500; $x--)
                                                                <option value="{{ $x }}">
                                                                    {{ $x }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">NPWP</label>
                                                        <input type="number" class="form-control form-control-sm" name="tin"
                                                            placeholder="NPWP">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">No.
                                                            HP</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="telp" placeholder="No. HP">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Jumlah Karyawan</label>
                                                        <select name="number_of_employee"
                                                            class="form-control form-control-sm">
                                                            <option value="<50">
                                                                < 50</option>
                                                            <option value="50-100">50 - 100</option>
                                                            <option value="100-500">100 - 500</option>
                                                            <option value=">500">
                                                                > 500</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Skala
                                                            Usaha</label>
                                                        <select name="business_scale" class="form-control form-control-sm">
                                                            <option value="Micro">
                                                                Usaha Mikro</option>
                                                            <option value="Small">Usaha Kecil</option>
                                                            <option value="Medium">Usaha Menengah</option>
                                                            <option value="Big">
                                                                Usaha Besar</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Bidang
                                                            Usaha</label>
                                                        <select name="business_field" class="form-control form-control-sm">
                                                            <option value="">Pilih bidang usaha</option>
                                                            @foreach ($business_field as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="button"
                                                    class="btn-next0 btn btn-sm btn-custom transition-3d-hover mr-1"
                                                    onclick="register(0)">Berikutnya<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                                <div style="display: none" class="btnStep0"
                                                    data-hs-step-form-next-options='{
                                                                                                                                                                                                                                                                                                                                                                                                            "targetSelector": "#basicFormSelectStepTwo"
                                                                                                                                                                                                                                                                                                                                                                                                        }'>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="basicFormSelectStepTwo" style="display: none;">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Provinsi</label>
                                                        <select class="form-control form-control-sm" name="province">
                                                            <option value="">Pilih provinsi</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Kota/Kabupaten</label>
                                                        <select class="form-control form-control-sm" name="city">
                                                            <option value="">Pilih kota/kabupaten</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-8">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Alamat Jalan</label>
                                                        <textarea name="street" class="form-control  form-control-sm" placeholder="Alamat Jalan" rows="2"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Kode Pos</label>
                                                        <input type="number" name="zip_code"
                                                            class="form-control form-control-sm"
                                                            placeholder="Kode Pos"></input>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <!-- Input Group -->
                                            <div class="d-flex justify-content-end">
                                                <a class="btn btn-sm btn-soft-secondary transition-3d-hover mr-1"
                                                    href="javascript:;"
                                                    data-hs-step-form-prev-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                        "targetSelector": "#basicFormSelectStepOne"
                                                                                                                                                                                                                                                                                                                                                                                                                    }'>
                                                    <i class="fa fa-angle-left fa-sm mr-1">
                                                    </i>Kembali
                                                </a>

                                                <button type="button"
                                                    class="btn-next1 btn btn-sm btn-custom transition-3d-hover mr-1"
                                                    onclick="register(1)">Berikutnya<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                                <div style="display: none" class="btnStep1"
                                                    data-hs-step-form-next-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                            "targetSelector": "#basicFormSelectStepThree"
                                                                                                                                                                                                                                                                                                                                                                                                                        }'>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="basicFormSelectStepThree" style="display: none;">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Email</label>
                                                        <input type="text" class="form-control form-control-sm" name="email"
                                                            placeholder="Email">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Username</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="username" placeholder="Username">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Password</label>

                                                        <input type="password" class="form-control form-control-sm"
                                                            name="password" placeholder="Password">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Konfirmasi
                                                            Password</label>
                                                        <input type="password" class="form-control form-control-sm"
                                                            name="password_confirmation" placeholder="Konfirmasi Password">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <!-- Checkbox -->
                                            <div
                                                class="custom-control custom-checkbox d-flex align-items-center text-muted mb-5">
                                                <input type="checkbox" class="custom-control-input" id="term" name="term">
                                                <label class="custom-control-label" for="term">
                                                    <small>
                                                        Saya setuju dengan
                                                        <a class="text-custom" target="_blank"
                                                            href="/terms-and-conditions">Syarat &
                                                            Ketentuan</a> Pusat Karir Unmer Malang
                                                    </small>
                                                </label>
                                            </div>
                                            <small class="text-danger" id="term-error"></small>
                                            <!-- End Checkbox -->
                                            <!-- Input Group -->
                                            <div class="d-flex justify-content-end">
                                                <a class="btn btn-sm btn-soft-secondary transition-3d-hover mr-1"
                                                    href="javascript:;"
                                                    data-hs-step-form-prev-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                "targetSelector": "#basicFormSelectStepTwo"
                                                                                                                                                                                                                                                                                                                                                                                                            }'><i
                                                        class="fa fa-angle-left fa-sm mr-1"></i>Kembali</a>

                                                <button type="button" onclick="register(2)"
                                                    class="btn-register btn btn-sm btn-custom transition-3d-hover">Daftar<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($role === 'seeker')
                                    <ul id="basicFormStepFormProgress" class="js-step-progress step step-md step-inline">

                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">1</span>
                                                <div class="step-content">
                                                    <span>Profil Pribadi</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">2</span>
                                                <div class="step-content">
                                                    <span>Alamat</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">3</span>
                                                <div class="step-content">
                                                    <span>Pendidikan</span>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="step-item">
                                            <div class="step-content-wrapper">
                                                <span class="step-icon step-icon-soft-custom">4</span>
                                                <div class="step-content">
                                                    <span>Akun</span>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <div id="basicFormStepFormContent">
                                        <div id="basicFormSelectStepOne" class="active">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Nama
                                                            Depan</label>
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            name="role" value="seeker">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="first_name" placeholder="Nama Depan" autofocus>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Nama
                                                            Belakang</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="last_name" placeholder="Nama Belakang">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">No.
                                                            HP</label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="telp" placeholder="No. HP">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Tanggal Lahir</label>
                                                        <input type="text" readonly="readonly"
                                                            class="fc-datepicker form-control form-control-sm"
                                                            name="date_of_birth" placeholder="yyyy-mm-dd">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Jenis
                                                            Kelamin</label>
                                                        <select name="gender" class="form-control form-control-sm">
                                                            <option value="Male">Pria</option>
                                                            <option value="Female">Wanita</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Status Kawin</label>
                                                        <select name="marital_status" class="form-control form-control-sm">
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Menikah</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <div style="display: none" class="btnStep0"
                                                    data-hs-step-form-next-options='{
                                                                                                                                                                                                                                                                                "targetSelector": "#basicFormSelectStepTwo"
                                                                                                                                                                                                                                                                            }'>
                                                </div>
                                                <button type="button"
                                                    class="btn-next0 btn btn-sm btn-custom transition-3d-hover mr-1"
                                                    onclick="register(0)">Berikutnya<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>

                                        <div id="basicFormSelectStepTwo" style="display: none;">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Provinsi</label>
                                                        <select class="form-control form-control-sm" name="province">
                                                            <option value="">Pilih provinsi</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Kota/Kabupaten</label>
                                                        <select class="form-control form-control-sm" name="city">
                                                            <option value="">Pilih kota/kabupaten</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-8">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Alamat Jalan</label>
                                                        <textarea name="street" class="form-control  form-control-sm" placeholder="Alamat Jalan" rows="2"></textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Kode Pos</label>
                                                        <input type="number" name="zip_code"
                                                            class="form-control form-control-sm"
                                                            placeholder="Kode Pos"></input>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a class="btn btn-sm btn-soft-secondary transition-3d-hover mr-1"
                                                    href="javascript:;"
                                                    data-hs-step-form-prev-options='{
                                                                                                                                                                                                                                                                                                "targetSelector": "#basicFormSelectStepOne"
                                                                                                                                                                                                                                                                                            }'><i
                                                        class="fa fa-angle-left fa-sm mr-1"></i>Kembali</a>

                                                <div style="display: none" class="btnStep1"
                                                    data-hs-step-form-next-options='{
                                                                                                                                                                                                                                                                                                    "targetSelector": "#basicFormSelectStepThree"
                                                                                                                                                                                                                                                                                                }'>
                                                </div>
                                                <button type="button"
                                                    class="btn-next1 btn btn-sm btn-custom transition-3d-hover mr-1"
                                                    onclick="register(1)">Berikutnya<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>
                                        <div id="basicFormSelectStepThree" style="display: none;">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Pendidikan Terakhir</label>
                                                        <select name="last_education" class="form-control form-control-sm">
                                                            <option value="">Pilih pendidikan terakhir</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S1">S1</option>
                                                            <option value="D4">D4</option>
                                                            <option value="D3">D3</option>
                                                            <option value="D2">D2</option>
                                                            <option value="D1">D1</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Jurusan</label>
                                                        <select name="major" class="form-control form-control-sm">
                                                            <option value="">Pilih jurusan</option>
                                                            @foreach ($major as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Nama
                                                            Institusi</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="institute_name" placeholder="Nama Institusi">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Tahun Lulus</label>
                                                        <select name="graduation_year"
                                                            class="form-control form-control-sm">
                                                            <option value="">Pilih tahun lulus</option>
                                                            @for ($x = date('Y') + 5; $x >= 1990; $x--)
                                                                <option value="{{ $x }}">
                                                                    {{ $x }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">IPK</label>
                                                        <input type="text" class="form-control form-control-sm" name="gpa"
                                                            placeholder="IPK">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a class="btn btn-sm btn-soft-secondary transition-3d-hover mr-1"
                                                    href="javascript:;"
                                                    data-hs-step-form-prev-options='{
                                                                                                                                                                                                                                                                        "targetSelector": "#basicFormSelectStepTwo"
                                                                                                                                                                                                                                                                    }'><i
                                                        class="fa fa-angle-left fa-sm mr-1"></i>Kembali</a>

                                                <div style="display: none" class="btnStep2"
                                                    data-hs-step-form-next-options='{
                                                                                                                                                                                                                                                                            "targetSelector": "#basicFormSelectStepFour"
                                                                                                                                                                                                                                                                        }'>
                                                </div>
                                                <button type="button"
                                                    class="btn-next2 btn btn-sm btn-custom transition-3d-hover mr-1"
                                                    onclick="register(2)">Berikutnya<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>
                                        <div id="basicFormSelectStepFour" style="display: none;">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Email</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="email" placeholder="Email">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Username</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="username" placeholder="Username">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Password</label>

                                                        <input type="password" class="form-control form-control-sm"
                                                            name="password" placeholder="Password">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Konfirmasi
                                                            Password</label>
                                                        <input type="password" class="form-control form-control-sm"
                                                            name="password_confirmation" placeholder="Konfirmasi Password">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            </div>
                                            <!-- Checkbox -->
                                            <div
                                                class="custom-control custom-checkbox d-flex align-items-center text-muted mb-5">
                                                <input type="checkbox" class="custom-control-input" id="term" name="term">
                                                <label class="custom-control-label" for="term">
                                                    <small>
                                                        Saya setuju dengan
                                                        <a class="text-custom" target="_blank"
                                                            href="/terms-and-conditions">Syarat &
                                                            Ketentuan</a> Pusat Karir Unmer Malang
                                                    </small>
                                                </label>
                                            </div>
                                            <small class="text-danger" id="term-error"></small>
                                            <!-- End Checkbox -->
                                            <!-- Input Group -->
                                            <div class="d-flex justify-content-end">

                                                <a class="btn btn-sm btn-soft-secondary transition-3d-hover mr-1"
                                                    href="javascript:;"
                                                    data-hs-step-form-prev-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "targetSelector": "#basicFormSelectStepTwo"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }'><i
                                                        class="fa fa-angle-left fa-sm mr-1"></i>Kembali</a>
                                                <button type="button" onclick="register(3)"
                                                    class="btn-register btn btn-sm btn-custom transition-3d-hover">Daftar<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row align-items-center">
                                    <div class="col-sm-7 mb-sm-0">
                                        <p class="font-size-1 text-muted mb-0">Sudah punya akun? <a
                                                class="font-weight-bold" href="{{ route('login') }}">Masuk</a>
                                        </p>
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
        <script src="{{ asset('app/api/province-city.js') }}"></script>
        <script src="{{ asset('app/auth/register.js') }}"></script>
    @endsection
