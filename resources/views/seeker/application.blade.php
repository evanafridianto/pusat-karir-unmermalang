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
                        <form id="SeekerApplication" class="card border w-md-85 w-lg-100 mx-md-auto" method="POST">
                            @csrf
                            <div class="card-header bg-custom text-white text-center py-4 px-5 px-md-6">
                                <h4 class="text-white mb-0">FORM LAMARAN </h4>
                            </div>
                            <div class="card-body p-md-6">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Nama
                                                Depan</label>
                                            <input type="hidden" class="form-control form-control-sm"
                                                value="{{ $profile->id }}" name="seeker_id">

                                            <input type="hidden" class="form-control form-control-sm"
                                                value="{{ $profile->user->email }}" readonly name="seeker_email">

                                            <input type="text" class="form-control form-control-sm" readonly
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
                                                value="{{ $profile->last_name }}" readonly name="last_name"
                                                placeholder="Nama Belakang">
                                            <small class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Posisi Kerja</label>
                                            <input type="hidden" value="{{ $vacancy->id }}"
                                                class="form-control form-control-sm" name="vacancy_id">
                                            <input type="text" name="job_title" value="{{ $vacancy->job_title }}"
                                                class="form-control form-control-sm" readonly placeholder="Posisi Kerja">
                                            <small class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Nama
                                                Perusahan</label>

                                            <input type="hidden" class="form-control form-control-sm"
                                                value="{{ $vacancy->employers->user->username }}" readonly
                                                name="company_username" placeholder="email Perusahaan">

                                            <input type="hidden" class="form-control form-control-sm"
                                                value="{{ $vacancy->employers->user->email }}" readonly
                                                name="company_email" placeholder="Nama Perusahaan">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $vacancy->employers->company_name }}" readonly
                                                name="company_name" placeholder="Nama Perusahaan">
                                            <small class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>

                                    <div class="col-sm-12">
                                        <p class="font-size-1 text-info">
                                            <i class="fa-solid fa-circle-info  mr-1"></i>Mohon mengisi berkas lamaran sesuai
                                            persyaratan!
                                        </p>
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Berkas Lamaran (CV, Cover letter, Application
                                                letter
                                                dsb)</label>
                                            {{-- <input type="file" class="form-control form-control-sm" name="documments"> --}}
                                            {{-- <div id="resumeAttach" class="js-dropzone dz-dropzone dz-dropzone-boxed">
                                                <div class="dz-message p-2">
                                                    <span class="d-block mb-1">Browse your files</span>
                                                    <small class="d-block text-muted">Maximum file size is 2MB</small>
                                                </div>
                                            </div> --}}
                                            <div class="needsclick dropzone" id="document-dropzone">
                                                <input type="hidden" name="route_doc"
                                                    value="{{ route('documents.store') }}">
                                                <div class="dz-default dz-message p-2">
                                                    <span class="d-block mb-1">Browse your files</span>
                                                    <small class="d-block text-muted">Maximum file size is 2MB</small>
                                                </div>
                                            </div>
                                            <small id="documents-error" class="text-danger"></small>
                                        </div>
                                        <!-- End Form Group -->
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <label class="input-label">Pesan (optional)</label>
                                            <textarea name="message" class="form-control  form-control-sm" placeholder="Masukkan pesan  " rows="6"></textarea>
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
        <script src="{{ asset('app/seeker/application.js') }}"></script>
    @endsection
