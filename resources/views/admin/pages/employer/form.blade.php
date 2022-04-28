@extends('admin.layouts.main')
@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.employer') }}">Perusahaan</a>
            <span class="breadcrumb-item active" id="breadcrumb-form">{{ $title }}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('admin.employer') }}"
                        class="float-right btn btn-secondary btn-icon rounded-circle mg-r-5 mg-b-10">
                        <div><i class="fa fa-long-arrow-right"></i></div>
                    </a>
                </div>
            </div>

            <form id="formEmployer">
                @csrf
                <h3>Profil Perusahaan</h3>
                <section>
                    <div class="row">
                        <!-- Input Group -->
                        <div class="col-sm-9">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Nama
                                    Perusahaan</label>
                                <input class="form-control" type="hidden" value="{{ Request::route()->getName() }}"
                                    name="route">
                                <input class="form-control" type="hidden" name="id">
                                <input type="text" class="form-control" name="company_name"
                                    placeholder="Masukkan Nama Perusahaan">
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-3">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Tahun Berdiri</label>
                                <select name="since" class="form-control">
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
                                <label class="form-control-label">NPWP</label>
                                <input type="number" class="form-control" name="tin" placeholder="Masukkan NPWP">
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">No.
                                    HP</label>
                                <input type="number" class="form-control" name="telp" placeholder="Masukkan No. HP">
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Jumlah Karyawan</label>
                                <select name="number_of_employee" class="form-control">
                                    <option value="<50">
                                        < 50</option>
                                    <option value="50-100">50 - 100</option>
                                    <option value="100-500">100 - 500</option>
                                    <option value="<500">
                                        < 500</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- Input Group -->
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Skala
                                    Usaha</label>
                                <select name="business_scale" class="form-control">
                                    <option value="Micro">
                                        Usaha Micro</option>
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
                                <label class="form-control-label">Kategori Bidang
                                    Usaha <a href="javascript: void(0);" onclick="add_category()">(Tambah
                                        Kategori)</a></label>
                                <select name="business_field" class="form-control">
                                    <option value="">Pilih bidang usaha</option>

                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-control-label">Logo</label>
                                    <input class="form-control" type="hidden" name="old_logo" />
                                    <input class="form-control" type="file" name="logo" accept="image/*" />
                                    <small class="text-danger"></small>
                                </div>
                                <div id="img-preview">
                                </div>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Halaman Website</label>
                                <input type="text" class="form-control" name="website"
                                    placeholder="Masukkan halaman website">
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-12">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi Perusahaan</label>
                                <textarea name="description" class="form-control " placeholder="Masukkan Deskripsi Perusahaan" rows="4"></textarea>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        @if (Request::route()->getName() === 'admin.employer.edit')
                            <div class="col-sm-12">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label class="form-control-label">Slug</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">pusatkarir.unmer.ac.id/</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Masukkan Slug" name="slug">
                                    </div><!-- input-group -->
                                    <small class="text-danger" id="slug-error"></small>
                                </div>
                                <!-- End Form Group -->
                            </div>
                        @endif
                    </div>
                </section>
                <h3>Lokasi</h3>
                <section>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
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
                                <input type="hidden" class="form-control" name="address_id">
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
                                <textarea name="street" class="form-control " placeholder="Alamat Jalan" rows="2"></textarea>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Kode Pos</label>
                                <input type="number" name="zip_code" class="form-control" placeholder="Kode Pos"></input>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                </section>
                <h3>Akun</h3>
                <section>
                    <div class="row">
                        <!-- Input Group -->
                        <div class="col-sm-12">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="hidden" class="form-control" name="user_id">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label id="label-password" class="form-control-label">Password</label>

                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="form-control-label">Konfirmasi
                                    Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Konfirmasi Password">
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
<script src="{{ asset('app/employer/form.js') }}"></script>

@endsection
