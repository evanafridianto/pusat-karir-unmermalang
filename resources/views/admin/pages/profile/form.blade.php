@extends('admin.layouts.main')
@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active" id="breadcrumb-form">{{ $title }}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <button onclick="history.back()"
                        class="float-right btn btn-secondary btn-icon rounded-circle mg-r-5 mg-b-10">
                        <div><i class="fa fa-long-arrow-right"></i></div>
                    </button>
                </div>
            </div>

            <form id="formProfile" enctype="multipart/form-data">
                @csrf
                <h3>Profil Perusahaan </h3>
                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" value="{{ $profile->logo }}" class="form-control " name="old_logo">
                                <label class="input-label">Logo</label>
                                <div id="img-preview">
                                    <label for="file-input">
                                        @if (!empty($profile->logo) && file_exists('storage/logo/' . $profile->logo))
                                            <img id="logo" class="avatar-img"
                                                src="{{ asset('storage/logo/' . $profile->logo) }}" alt="Logo" width="120"
                                                height="120">
                                        @else
                                            <img id="logo" class="avatar-img"
                                                src="https://ui-avatars.com/api/?name={{ $profile->company_name }}"
                                                alt="Logo" width="120" height="120">
                                        @endif
                                    </label>
                                    <small id="logo-error" class="text-danger"></small>
                                </div>
                                <label class="btn btn-sm btn-info btn-xs">
                                    <span><i class="fa fa-upload"></i>
                                    </span>
                                    <input style="display: none" name="logo" type="file" class=""
                                        accept="image/*" />
                                </label>
                                @if (!empty($profile->logo) && file_exists('storage/logo/' . $profile->logo))
                                    <button type="button" id="destoryLogo" class="btn btn-sm btn-danger btn-xs"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Nama Perusahaan </label>
                                <input class="form-control" type="hidden" value="{{ $profile->id }}" name="id">
                                <input class="form-control" type="text" value="{{ $profile->company_name }}"
                                    name="company_name" placeholder="Masukkan nama perusahaan">

                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Tahun Berdiri</label>
                                <select name="since" class="form-control">
                                    <option value="">
                                        Pilih tahun berdiri</option>
                                    @for ($x = date('Y'); $x >= 1500; $x--)
                                        <option {{ $profile->since == $x ? 'selected' : '' }} value="{{ $x }}">
                                            {{ $x }}
                                        </option>
                                    @endfor
                                </select>
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">NPWP</label>
                                <input class="form-control" type="text" value="{{ $profile->tin }}" name="tin"
                                    placeholder="Masukkan NPWP">
                                <small class="text-danger category-error"></small>
                            </div><!-- col-4 -->
                        </div><!-- col-3 -->
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Website</label>
                                <input class="form-control" type="text" value="{{ $profile->website }}" name="website"
                                    placeholder="Masukkan nama situs web">
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">No Telp/HP</label>
                                <input class="form-control" type="text" value="{{ $profile->telp }}" name="telp"
                                    placeholder="Masukkan no. telp">
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Jumlah Karyawan</label>
                                <select name="number_of_employee" class="form-control">
                                    <option {{ $profile->number_of_employee == '<50' ? 'selected' : '' }} value="<50">
                                        < 50</option>
                                    <option {{ $profile->number_of_employee == '50-100' ? 'selected' : '' }}
                                        value="50-100">50 - 100</option>
                                    <option {{ $profile->number_of_employee == '100-500' ? 'selected' : '' }}
                                        value="100-500">100 - 500</option>
                                    <option {{ $profile->number_of_employee == '>500' ? 'selected' : '' }} value=">500">
                                        > 500</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-8 -->
                        <div class="col-lg-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Skala
                                    Usaha</label>
                                <select name="business_scale" class="form-control">
                                    <option {{ $profile->business_scale == 'Micro' ? 'selected' : '' }} value="Micro">
                                        Usaha Mikro</option>
                                    <option {{ $profile->business_scale == 'Small' ? 'selected' : '' }} value="Small">
                                        Usaha Kecil</option>
                                    <option {{ $profile->business_scale == 'Medium' ? 'selected' : '' }} value="Medium">
                                        Usaha Menengah</option>
                                    <option {{ $profile->business_scale == 'Big' ? 'selected' : '' }} value="Big">
                                        Usaha Besar</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Bidang
                                    Usaha</label>
                                <select name="business_field" class="form-control">
                                    <option value="">Pilih bidang usaha</option>
                                    @foreach ($business_fields as $business_field)
                                        <option {{ $profile->category_id == $business_field->id ? 'selected' : '' }}
                                            value="{{ $business_field->id }}">
                                            {{ $business_field->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                                <textarea rows="5" class="form-control" placeholder="Deskripsi"
                                    name="description">{{ $profile->description }}</textarea>
                                <small class="text-danger"></small>
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                </section>
                <h3>Alamat</h3>
                <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Provinsi</label>
                                <input type="hidden" value="{{ $profile->address->id }}" name="address_id">
                                <select class="form-control " name="province">
                                    <option value="">Pilih provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option {{ $profile->address->province_id == $province->id ? 'selected' : '' }}
                                            value="{{ $province->id }}">
                                            {{ $province->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-lg-6">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Kota/Kabupaten</label>
                                <input type="hidden" name="city_id" value="{{ $profile->address->city_id }} " id="">
                                <select class="form-control " name="city">
                                    <option value="">Pilih kota/kabupaten</option>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>

                        <div class="col-lg-8">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Alamat Jalan</label>
                                <textarea name="street" class="form-control  " placeholder="Alamat Jalan"
                                    rows="2">{{ $profile->address->street }}</textarea>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <div class="col-lg-4">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Kode Pos</label>
                                <input type="number" value="{{ $profile->address->zip_code }}" name="zip_code"
                                    class="form-control " placeholder="Kode Pos"></input>
                                <small class="text-danger"></small>
                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                </section>
            </form>
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

    <script src="{{ asset('app/api/province-city.js') }}"></script>
    <script src="{{ asset('app/profile/form.js') }}"></script>
@endsection
