@extends('admin.layouts.main')
@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.article') }}">Halaman</a>
            <span class="breadcrumb-item active" id="breadcrumb-form">{{ $title }}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('admin.page') }}"
                        class="float-right btn btn-secondary btn-icon rounded-circle mg-r-5 mg-b-10">
                        <div><i class="fa fa-long-arrow-right"></i></div>
                    </a>
                </div>
            </div>
            <form id="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-{{ Route::is('admin.page.edit') ? 6 : 12 }}">
                        <div class="form-group">
                            <input class="form-control" type="hidden" value="{{ Request::route()->getName() }}"
                                name="route">
                            <input class="form-control" type="hidden" name="id">
                            <label class="form-control-label">Judul</label>
                            <input class="form-control" type="text" name="title" placeholder="Masukkan Judul" autofocus>
                            <small class="text-danger"></small>
                        </div>
                    </div><!-- col-4 -->
                    @if (Request::route()->getName() == 'admin.page.edit')
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
                            <label class="form-control-label">Konten</label>
                            <textarea rows="8" class="form-control" placeholder="Konten" name="content" id="editor"></textarea>
                            <small class="text-danger content"></small>
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
                <div class="form-layout-footer">
                    <button type="button" id="btn-spinner" onclick="store()" class="btn btn-custom"><i
                            class="fa fa-paper-plane mg-r-10"></i>{{ Request::route()->getName() === 'admin.page.create' ? 'Publikasikan' : 'Perbarui' }}</button>
                </div><!-- form-layout-footer -->
            </form>
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
    <script src="{{ asset('app/page/form.js') }}"></script>
@endsection
