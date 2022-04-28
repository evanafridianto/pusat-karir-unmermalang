    @extends('front.layouts.main')
    @section('content')
        <main id="content" role="main">
            <!-- Article Section -->
            <div class="container space-2 space-lg-3">
                {{-- <div class="row justify-content-lg-between align-items-lg-center"> --}}
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <a href="{{ route('employer.profile', Auth::user()->username) }}"
                                class="back font-weight-bold">
                                <i class="fas fa-angle-left fa-sm mr-1"></i>
                                Kembali
                            </a>
                        </div>
                        <form id="vacancyForm" class="js-step-form card border w-md-85 w-lg-100 mx-md-auto"
                            data-hs-step-form-options='{
                                                                                                                                                                                                                                                                                                                                                    "progressSelector": "#basicFormStepFormProgress",
                                                                                                                                                                                                                                                                                                                                                    "stepsSelector": "#basicFormStepFormContent"
                                                                                                                                                                                                                                                                                                                                                    }'>

                            @csrf
                            <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-12">
                                <h4 class="text-white mb-0">POSTING LOWONGAN</h4>
                            </div>
                            <!-- End Step -->
                            <div class="card-body p-md-12">
                                <ul id="basicFormStepFormProgress" class="js-step-progress step step-md step-inline">
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <span class="step-icon step-icon-soft-custom">1</span>
                                            <div class="step-content">
                                                <span>Informasi Lowongan</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="step-item">
                                        <div class="step-content-wrapper">
                                            <span class="step-icon step-icon-soft-custom">2</span>
                                            <div class="step-content">
                                                <span>Alamat Kerja</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div id="basicFormStepFormContent">
                                    <div id="basicFormSelectStepOne" class="active">
                                        <div class="row">
                                            <!-- Input Group -->
                                            <div class="col-sm-12">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label class="input-label">Posisi Kerja</label>
                                                    <input type="hidden" value="{{ Auth::user()->userable->id }}"
                                                        name="company">
                                                    <input class="form-control" type="hidden"
                                                        value="{{ Request::route()->getName() }}" name="route">
                                                    <input type="hidden" name="id">
                                                    <input type="text" class="form-control form-control-sm" name="job_title"
                                                        placeholder="Posisi Kerja">
                                                    <small class="text-danger"></small>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                            @if (Request::route()->getName() == 'employer.vacancy.edit')
                                                <div class="col-sm-12">
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="input-label">Slug</label>
                                                        <input type="text" class="form-control form-control-sm" name="slug"
                                                            placeholder="Slug">
                                                        <small class="text-danger"></small>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                            @endif
                                            <div class="col-sm-12">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label class="input-label">Deskripsi</label>
                                                    <textarea name="description" id="editor" class="form-control  form-control-sm" placeholder="Deskripsi Pekerjaan"
                                                        rows="6"></textarea>
                                                    <small id="description-error" class="text-danger"></small>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label class="input-label">Kategori Jurusan</label>
                                                    <select class="form-control form-control-sm" name="category[]"
                                                        data-placeholder="Pilih kategori" multiple="multiple">
                                                        <option value="">
                                                            Pilih kategori</option>
                                                        @foreach ($majors as $major)
                                                            <option value="{{ $major->id }}">
                                                                {{ $major->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small id="category-error" class="text-danger"></small>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label class="input-label">Kotrak Kerja</label>
                                                    <select name="job_type" class="form-control form-control-sm">
                                                        <option value="">Pilih kontrak kerja</option>
                                                        <option value="Permanent-employment">Karyawan tetap (PKWTT)</option>
                                                        <option value="Fixed-term">Waktu tertentu (PKWT)</option>
                                                        <option value="Part-time">Paruh Waktu</option>
                                                        <option value="Outsourcing">Borongan</option>
                                                        <option value="Internship">Magang</option>
                                                    </select>
                                                    <small class="text-danger"></small>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                            <div class="col-sm-4">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label class="input-label">Berakhir pada</label>
                                                    <input type="text" name="expiry_date"
                                                        class="form-control form-control-sm datepicker"
                                                        placeholder="MM/DD/YYYY HH:mm" required />
                                                    <small id="expiry_date-error" class="text-danger"></small>
                                                </div>
                                                <!-- End Form Group -->
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button"
                                                class="btn-next0 btn btn-sm btn-custom transition-3d-hover mr-1"
                                                onclick="store(0)">Berikutnya<i
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
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="same_address" id="same_address"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="same_address">Alamat kerja
                                                            = alamat perusahaan?</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Input Group -->
                                            <div class="col-sm-6">
                                                <!-- Form Group -->
                                                <div class="form-group">
                                                    <label class="input-label">Provinsi</label>
                                                    <input type="hidden" name="address_id">
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
                                                        class="form-control form-control-sm" placeholder="Kode Pos"></input>
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
                                            <button type="button" onclick="store(1)"
                                                class="btn-next1 btn btn-sm btn-custom transition-3d-hover">Simpan<i
                                                    class="fa fa-angle-right fa-sm ml-1"></i></button>
                                        </div>
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
        <script src="{{ asset('app/employer/vacancy-form.js') }}"></script>
    @endsection
