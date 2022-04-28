 @extends('admin.layouts.main')
 @section('content')
     <div class="br-pageheader">
         <nav class="breadcrumb pd-0 mg-0 tx-12">
             <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
             <span class="breadcrumb-item active">{{ $title }}</span>
         </nav>
     </div><!-- br-pageheader -->
     <div class="br-pagebody">
         <a href="{{ route('admin.article.create') }}" class="btn btn-custom  mg-b-10 btn-spinner"><i
                 class="fa fa-plus mg-r-10"></i>
             Tambah Artikel Baru</a>
         <div class="br-section-wrapper">
             <div class="table-wrapper">
                 <table id="datatable" class="table display responsive nowrap">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Judul</th>
                             <th>Thumbnail</th>
                             <th>Tanggal Publish</th>
                             <th>Kategori</th>
                             <th class="text-center">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>

                     </tbody>
                 </table>
             </div><!-- table-wrapper -->
         </div><!-- br-section-wrapper -->
     </div><!-- br-pagebody -->
     <script src="{{ asset('app/article/index.js') }}"></script>
 @endsection
