@extends('admin.layouts.main')
@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active">{{ $title }}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagebody">
        <a href="{{ route('admin.page.create') }}" class="btn btn-custom  mg-b-10 btn-spinner"><i
                class="fa fa-plus mg-r-10"></i>
            Tambah Halaman Baru</a>
        <div class="br-section-wrapper">
            <div class="table-wrapper">
                <div class="table-wrapper">
                    <table id="datatable" class="table display responsive nowrap category-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Halaman</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Tampilkan Banner</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- col-6 -->
        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
    <script src="{{ asset('app/page/index.js') }}"></script>
    {{-- @if ($page == 'about')
    ini halaman about
@elseif($page == 'terms-and-conditions')
    ini halaman syarat
@elseif($page == 'membership-information')
    ini halaman info member
@endif --}}
@endsection
