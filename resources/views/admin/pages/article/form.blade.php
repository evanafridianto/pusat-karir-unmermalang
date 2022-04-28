@extends('admin.layouts.main')
@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.article') }}">Artikel</a>
            <span class="breadcrumb-item active" id="breadcrumb-form">{{ $title }}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('admin.article') }}"
                        class="float-right btn btn-secondary btn-icon rounded-circle mg-r-5 mg-b-10">
                        <div><i class="fa fa-long-arrow-right"></i></div>
                    </a>
                </div>
            </div>
            <form id="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-{{ Route::is('admin.article.edit') ? 6 : 12 }}">
                        <div class="form-group">
                            <input class="form-control" type="hidden" value="{{ Request::route()->getName() }}"
                                name="route">
                            <input class="form-control" type="hidden" name="id">
                            <input class="form-control" type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <label class="form-control-label">Judul</label>
                            <input class="form-control" type="text" name="title" placeholder="Masukkan Judul" autofocus>
                            <small class="text-danger"></small>
                        </div>
                    </div><!-- col-4 -->
                    @if (Request::route()->getName() == 'admin.article.edit')
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
                            <textarea rows="15" class="form-control" placeholder="Konten" name="content" id="editor"></textarea>
                            <small class="text-danger content"></small>
                        </div>
                    </div><!-- col -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="form-control-label">Thumbnail</label>
                                <input class="form-control" type="hidden" name="old_thumbnail" />
                                <input class="form-control" type="file" name="thumbnail" accept="image/*" />
                                <small class="text-danger"></small>
                            </div>
                            <div id="img-preview">
                            </div>
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Kategori <a href="javascript: void(0);"
                                    onclick="add_category()">(Tambah
                                    Kategori)</a></label>
                            <select class="form-control category-select" name="category">
                                <option value="">Pilih kategori</option>
                            </select>
                            <small class="text-danger"></small>
                        </div>
                    </div><!-- col-3 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Tag</label>
                            @if (Request::route()->getName() === 'admin.article.create')
                                <input class="form-control" type="text" name="tag" placeholder="Masukkan tag"
                                    data-role="tagsinput">
                            @else
                                <input class="form-control" type="text" name="tag" placeholder="Masukkan tag">
                            @endif
                            <small class="text-danger"></small>
                            <small class="text-info">Beri tanda (,) setelah setiap tag</small>
                        </div>
                    </div><!-- col-3 -->
                </div><!-- row -->
                <div class="form-layout-footer">
                    <button type="button" onclick="store()" class="btn btn-custom" id="btn-spinner"><i
                            class="fa fa-paper-plane mg-r-10"></i>{{ Request::route()->getName() === 'admin.article.create' ? 'Publikasikan' : 'Perbarui' }}</button>
                </div><!-- form-layout-footer -->
            </form>
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
@section('form')
    @include('admin.pages.category.form')
@show
<script src="{{ asset('app/article/form.js') }}"></script>

@endsection
