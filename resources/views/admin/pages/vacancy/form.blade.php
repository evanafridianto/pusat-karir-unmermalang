@extends('admin.layouts.main')
@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.vacancy') }}">Lowongan</a>
            <span class="breadcrumb-item active" id="breadcrumb-form">{{ $title }}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('admin.vacancy') }}"
                        class="float-right btn btn-secondary btn-icon rounded-circle mg-r-5 mg-b-10">
                        <div><i class="fa fa-long-arrow-right"></i></div>
                    </a>
                </div>
            </div>

            <form id="formVacancy" enctype="multipart/form-data">
                @csrf
                <h3>Informasi Lowongan</h3>
                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Perusahaan </label>
                                <input class="form-control" type="hidden" name="id">
                                <input class="form-control" type="hidden" value="{{ Request::route()->getName() }}"
                                    name="route">
                                <select class="form-control" name="company" autofocus>
                                    <option value="">Pilih perusahaan</option>
                                    @foreach ($employer as $item)
                                        <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-{{ Route::is('admin.vacancy.edit') ? 6 : 12 }}">
                            <div class="form-group">
                                <label class="form-control-label">Posisi Kerja</label>
                                <input class="form-control" type="text" name="job_title"
                                    placeholder="Masukkan posisi Kerja">
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-4 -->
                        @if (Request::route()->getName() == 'admin.vacancy.edit')
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Slug</label>
                                    <input class="form-control" type="text" name="slug" placeholder="Masukkan slug">
                                    <small class="text-danger"></small>
                                </div>
                            </div><!-- col-4 -->
                        @endif
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <textarea rows="5" class="form-control" placeholder="Deskripsi" name="description" id="editor"></textarea>
                                <small class="text-danger description"></small>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Kategori Jurusan <a href="javascript: void(0);"
                                        onclick="add_category()">(Tambah
                                        Kategori)</a></label>
                                <select class="form-control category-select" data-placeholder="Pilih kategori"
                                    name="category_ids[]" multiple="multiple">

                                </select>
                                <small class="text-danger category-error"></small>
                            </div><!-- col-4 -->
                        </div><!-- col-3 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Kontrak Kerja</label>
                                <select class="form-control" name="job_type">
                                    <option value="">Pilih kontrak kerja</option>
                                    <option value="Permanent-employment">Karyawan tetap (PKWTT)</option>
                                    <option value="Fixed-term">Waktu tertentu (PKWT)</option>
                                    <option value="Part-time">Paruh Waktu</option>
                                    <option value="Outsourcing">Borongan</option>
                                    <option value="Internship">Magang</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Berakhir pada tanggal </label>
                                <input type="text" name="expiry_date" class="form-control datepicker"
                                    placeholder="MM/DD/YYYY HH:mm" required />
                                <small class="text-danger expiry-date-error"></small>
                            </div>
                        </div><!-- col-8 -->
                    </div><!-- row -->
                </section>
                <h3>Alamat Kerja</h3>
                <section>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="ckbox">
                                    <input type="checkbox" name="same_address"><span>Alamat kerja = alamat perusahaan
                                        ?</span>
                                </label>
                            </div>
                        </div>
                    </div><!-- col-3 -->
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <input type="hidden" name="address_id">
                                <label class="form-control-label">Provinsi</label>
                                <select class="form-control" name="province">
                                    <option value="">Pilih provinsi</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Kota/Kabupaten</label>
                                <select class="form-control" name="city">
                                    <option value="">Pilih kota/kabupaten</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-8">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Alamat Jalan</label>
                                <textarea name="street" class="form-control " placeholder="Masukkan alamat jalan" rows="2"></textarea>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Kode Pos</label>
                                <input type="number" name="zip_code" class="form-control"
                                    placeholder="Masukkan kode pos"></input>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                </section>
            </form>
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@section('form')
    @include('admin.pages.category.form')
@show
<script src="{{ asset('app/api/province-city.js') }}"></script>
<script src="{{ asset('app/vacancy/form.js') }}"></script>

@endsection
