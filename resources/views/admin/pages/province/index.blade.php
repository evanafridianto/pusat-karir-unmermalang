 @extends('admin.layouts.main')
 @section('content')
     <div class="br-pageheader">
         <nav class="breadcrumb pd-0 mg-0 tx-12">
             <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
             <span class="breadcrumb-item active">{{ $title }}</span>
         </nav>
     </div><!-- br-pageheader -->
     <div class="br-pagebody">
         <button onclick="add()" class="btn btn-custom mg-b-10"><i class="fa fa-plus mg-r-10"></i>
             Tambah Provinsi Baru</button>
         <div class="br-section-wrapper">
             <div class="table-wrapper">
                 <div class="table-wrapper">
                     <table id="datatable" class="table display responsive nowrap category-table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Nama Provinsi</th>
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


     <!-- BASIC MODAL -->
     <div id="provinceModal" class="modal fade" data-backdrop="static">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content bd-0 tx-14">
                 <div class="modal-header pd-y-20 pd-x-25">
                     <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title">Tambah Provinsi</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body pd-25">
                     <form id="provinceForm">
                         @csrf
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <label for="">Nama Provinsi</label>
                                 <input type="hidden" name="id">
                                 <input type="text" name="name" class="form-control" placeholder="Masukkan nama provinsi">
                                 <small class="text-danger"></small>
                             </div><!-- form-group -->
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-custom tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                         onclick="store()" id="btn-spinner2"><i class="fa fa-paper-plane mg-r-10"></i>Simpan</button>
                     <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                         data-dismiss="modal">Batal</button>
                 </div>
             </div>
         </div><!-- modal-dialog -->
     </div><!-- modal -->
     <script src="{{ asset('app/province/index.js') }}"></script>
 @endsection
