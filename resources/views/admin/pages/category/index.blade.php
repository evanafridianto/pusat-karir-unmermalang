 @extends('admin.layouts.main')
 @section('content')
     <div class="br-pageheader">
         <nav class="breadcrumb pd-0 mg-0 tx-12">
             <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
             <span class="breadcrumb-item active">{{ $title }}</span>
         </nav>
     </div><!-- br-pageheader -->
     <div class="br-pagebody">
         <button onclick="add_category()" class="btn btn-custom mg-b-10"><i class="fa fa-plus mg-r-10"></i>
             Tambah Kategori Baru</button>
         <div class="br-section-wrapper">
             <div class="table-wrapper">
                 <div class="table-wrapper">
                     <table id="datatable" class="table display responsive nowrap category-table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Nama Kategori</th>
                                 <th>Kategori Induk</th>
                                 <th>Slug</th>
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

 @section('form')
     @include('admin.pages.category.form')
 @show

 <script src="{{ asset('app/category/index.js') }}"></script>

@endsection
