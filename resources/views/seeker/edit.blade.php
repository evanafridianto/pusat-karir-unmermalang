    @extends('front.layouts.main')
    @section('content')
        <main id="content" role="main">
            <!-- Article Section -->
            <div class="container space-2 space-lg-3">
                {{-- <div class="row justify-content-lg-between align-items-lg-center"> --}}
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        {{-- <a href="{{ route('seeker.profile', Auth::user()->username) }}" class="back float-right ">
                            Kembali <i class="fas fa-angle-right fa-sm ml-1"></i>
                        </a> --}}
                        <div class="mb-5">
                            <a href="{{ route('seeker.profile', Auth::user()->username) }}" class="font-weight-bold back">
                                <i class="fas fa-angle-left fa-sm mr-1"></i>
                                Kembali
                            </a>
                        </div>
                        <!-- Form -->

                        @if ($edit == 'profile')
                            <form id="SeekerEditProfile" class="js-step-form card border w-md-85 w-lg-100 mx-md-auto"
                                data-hs-step-form-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "progressSelector": "#basicFormStepFormProgress",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "stepsSelector": "#basicFormStepFormContent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }'>

                                @csrf
                                <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-12">
                                    <h4 class="text-white mb-0">FORM EDIT PROFIL</h4>


                                </div>

                                <!-- Step -->
                                <!-- End Step -->
                                <div class="card-body p-md-12">
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

                                    </ul>
                                    <div id="basicFormStepFormContent">
                                        <div id="basicFormSelectStepOne" class="active">
                                            <div class="row text-center">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{ $profile->logo }}"
                                                            class="form-control form-control-sm" name="old_logo">
                                                        <label class="input-label">Foto Profil</label>
                                                        <div id="img-preview">
                                                            <div class="image-upload">
                                                                <label for="file-input">
                                                                    @if (!empty($profile->logo) && file_exists('storage/logo/' . $profile->logo))
                                                                        <img id="logo" class="avatar-img"
                                                                            src="{{ asset('storage/logo/' . $profile->logo) }}"
                                                                            alt="Logo" width="120" height="120">
                                                                    @else
                                                                        <img id="logo" class="avatar-img"
                                                                            src="https://ui-avatars.com/api/?name={{ $profile->first_name }}+{{ $profile->last_name }}"
                                                                            alt="Logo" width="120" height="120">
                                                                    @endif
                                                                </label>
                                                            </div>
                                                            <small id="logo-error" class="text-danger"></small>
                                                        </div>
                                                        <label
                                                            class="btn btn-sm btn-info btn-xs transition-3d-hover file-attachment-btn"
                                                            for="fileAttachmentBtn">
                                                            <span id="customFileExample5"><i class="fa-solid fa-upload"></i>
                                                            </span>
                                                            <input id="fileAttachmentBtn" name="logo" type="file"
                                                                class="js-custom-file-input file-attachment-btn-label"
                                                                accept="image/*" />
                                                        </label>
                                                        @if (!empty($profile->logo) && file_exists('storage/logo/' . $profile->logo))
                                                            <button type="button" id="destoryLogo"
                                                                class="btn btn-danger btn-xs"><i
                                                                    class="fa-solid fa-trash"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Nama
                                                            Depan</label>
                                                        <input type="hidden" class="form-control form-control-sm"
                                                            value="{{ $profile->id }}" name="id">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="first_name" value="{{ $profile->first_name }}"
                                                            placeholder="Nama Depan">
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
                                                            name="last_name" value="{{ $profile->last_name }}"
                                                            placeholder="Nama Belakang">
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
                                                            name="telp" value="{{ $profile->telp }}" placeholder="No. HP">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Tanggal Lahir</label>
                                                        <input type="text" value="{{ $profile->date_of_birth }}"
                                                            readonly="readonly"
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
                                                            <option {{ $profile->gender == 'Male' ? 'selected' : '' }}
                                                                value="Male">Pria</option>
                                                            <option {{ $profile->gender == 'Female' ? 'selected' : '' }}
                                                                value="Female">Wanita</option>
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
                                                            <option
                                                                {{ $profile->marital_status == 'Single' ? 'selected' : '' }}
                                                                value="Single">Single</option>
                                                            <option
                                                                {{ $profile->marital_status == 'Married' ? 'selected' : '' }}
                                                                value="Married">Menikah</option>
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Situs Web</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="website" value="{{ $profile->website }}"
                                                            placeholder="https://www.example.com/">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Tentang Saya</label>
                                                        <textarea name="description" class="form-control  form-control-sm" placeholder="Tentang Saya"
                                                            rows="6">{{ $profile->description }}</textarea>
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
                                                    onclick="store(0)">Berikutnya<i
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
                                                        <input type="hidden" value="{{ $profile->address->id }}"
                                                            name="address_id">
                                                        <select class="form-control form-control-sm" name="province">
                                                            <option value="">Pilih provinsi</option>
                                                            @foreach ($provinces as $province)
                                                                <option
                                                                    {{ $profile->address->province_id == $province->id ? 'selected' : '' }}
                                                                    value="{{ $province->id }}">
                                                                    {{ $province->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>

                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Kota/Kabupaten</label>
                                                        <input type="hidden" name="city_id"
                                                            value="{{ $profile->address->city_id }} " id="">
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
                                                        <textarea name="street" class="form-control  form-control-sm" placeholder="Alamat Jalan"
                                                            rows="2">{{ $profile->address->street }}</textarea>
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <div class="col-sm-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Kode Pos</label>
                                                        <input type="number" name="zip_code"
                                                            value="{{ $profile->address->zip_code }}"
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
                                                    onclick="store(1)">Berikutnya<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>
                                        <div id="basicFormSelectStepThree" style="display: none;">
                                            <div class="row">
                                                <!-- Input Group -->
                                                <div class="col-sm-6">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{ $profile->id }}" name="seeker_id">
                                                        <label class="input-label">Pendidikan Terakhir</label>
                                                        <select name="last_education" class="form-control form-control-sm">
                                                            <option value="">Pilih pendidikan terakhir</option>
                                                            <option
                                                                {{ $profile->seeker_education->last_education == 'S2' ? 'selected' : '' }}
                                                                value="S2">S2</option>
                                                            <option
                                                                {{ $profile->seeker_education->last_education == 'S1' ? 'selected' : '' }}
                                                                value="S1">S1</option>
                                                            <option
                                                                {{ $profile->seeker_education->last_education == 'D4' ? 'selected' : '' }}
                                                                value="D4">D4</option>
                                                            <option
                                                                {{ $profile->seeker_education->last_education == 'D3' ? 'selected' : '' }}
                                                                value="D3">D3</option>
                                                            <option
                                                                {{ $profile->seeker_education->last_education == 'D2' ? 'selected' : '' }}
                                                                value="D2">D2</option>
                                                            <option
                                                                {{ $profile->seeker_education->last_education == 'D1' ? 'selected' : '' }}
                                                                value="D1">D1</option>
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
                                                            @foreach ($majors as $major)
                                                                <option
                                                                    {{ $profile->seeker_education->major == $major->id ? 'selected' : '' }}
                                                                    value="{{ $major->id }}">
                                                                    {{ $major->name }}</option>
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
                                                            name="institute_name"
                                                            value="{{ $profile->seeker_education->institute_name }}"
                                                            placeholder="Nama Institusi">
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
                                                            @for ($x = date('Y') + 5; $x >= 2010; $x--)
                                                                <option
                                                                    {{ $profile->seeker_education->graduation_year == $x ? 'selected' : '' }}
                                                                    value="{{ $x }}">
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
                                                            value="{{ $profile->seeker_education->gpa }}"
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
                                                    onclick="store(2)">Simpan<i
                                                        class="fa fa-angle-right fa-sm ml-1"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script src="{{ asset('app/api/province-city.js') }}"></script>
                            <script src="{{ asset('app/seeker/edit-profile.js') }}"></script>
                        @elseif($edit == 'account')
                            <form id="SeekerEditAccount" class="card border w-md-85 w-lg-100 mx-md-auto" method="POST"
                                action="{{ route('login') }}">
                                @csrf
                                <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-6">
                                    <h4 class="text-white mb-0">FORM EDIT AKUN </h4>
                                </div>
                                <div class="card-body p-md-6">
                                    <div class="row">
                                        <!-- Input Group -->
                                        <div class="col-sm-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="input-label">Email</label>
                                                <input type="hidden" class="form-control form-control-sm"
                                                    value=" {{ $account->id }}" name="user_id">
                                                <input type="text" class="form-control form-control-sm"
                                                    value="{{ $account->email }}" name="email" placeholder="Email">
                                                <small class="text-danger"></small>
                                            </div>
                                            <!-- End Form Group -->
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="input-label">Username</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    value="{{ $account->username }}" name="username"
                                                    placeholder="Username">
                                                <small class="text-danger"></small>
                                            </div>
                                            <!-- End Form Group -->
                                        </div>

                                        <div class="col-sm-6">
                                            <!-- Form Group -->
                                            <div class="form-group">
                                                <label class="input-label">Password Baru</label>

                                                <input type="password" class="form-control form-control-sm" name="password"
                                                    placeholder="Password">
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

                                    <div class="row align-items-center">
                                        <div class="col-sm-7 mb-3 mb-sm-0">

                                        </div>
                                        <div class="col-sm-5 text-sm-right">
                                            <button id="btnSave" type="button" onclick="store()"
                                                class="btn btn-sm btn-custom transition-3d-hover">Simpan
                                                <i class="fa fa-angle-right fa-sm ml-1"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script src="{{ asset('app/seeker/edit-account.js') }}"></script>
                        @endif
                        <!-- End Form -->
                    </div>
                </div>
            </div>
            <!-- End Article Section -->
        </main>
    @endsection
