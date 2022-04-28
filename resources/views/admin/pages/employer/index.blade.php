 @extends('admin.layouts.main')
 @section('content')
     <div class="br-pageheader">
         <nav class="breadcrumb pd-0 mg-0 tx-12">
             <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
             <span class="breadcrumb-item active">{{ $title }}</span>
         </nav>
     </div><!-- br-pageheader -->
     <div class="br-pagebody">
         <div class="br-section-wrapper">
             <div class="table-wrapper">
                 <table id="datatable" class="table display responsive nowrap">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Nama Perusahaan</th>
                             <th>NPWP</th>
                             <th>Bidang Usaha</th>
                             <th>Skala Usaha</th>
                             <th>Kota</th>
                             <th>Status</th>
                             <th class="text-center">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>

                     </tbody>
                 </table>
             </div><!-- table-wrapper -->
         </div><!-- br-section-wrapper -->
     </div><!-- br-pagebody -->


     <!-- BASIC MODAL -->
     <div id="detailModal" class="modal fade" data-backdrop="static">
         <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
             <div class="modal-content bd-0 tx-14">
                 <div class="modal-header pd-y-20 pd-x-25">
                     <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title-form-category">Detail Perusahaan
                     </h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                 <div class="modal-body pd-25">
                     <div class="bd bd-gray-300 rounded table-responsive">
                         <table class="table mg-b-0">
                             <tbody>
                                 <tr>
                                     <th class="bg-info text-white">Profil Perusahaan</th>
                                     <td></td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Logo</th>
                                     <td>:</td>
                                     <td id="logo"><img class="img-thumbnail wd-120 ht-120 edit-thumbnail" src=""></img>
                                     </td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Nama Perusahaan</th>
                                     <td>:</td>
                                     <td id="company_name"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Tahun Berdiri</th>
                                     <td>:</td>
                                     <td id="since"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">NPWP</th>
                                     <td>:</td>
                                     <td id="tin"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Telp</th>
                                     <td>:</td>
                                     <td id="telp"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Skala Usaha</th>
                                     <td>:</td>
                                     <td id="business_scale"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Bidang Usaha</th>
                                     <td>:</td>
                                     <td id="category"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Jumlah Karyawan</th>
                                     <td>:</td>
                                     <td id="number_of_employee"></td>
                                 </tr>

                                 <tr>
                                     <th scope="row">Website</th>
                                     <td>:</td>
                                     <td id="website"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Deskripsi</th>
                                     <td>:</td>
                                     <td id="description"></td>
                                 </tr>
                                 <tr>
                                     <th class="bg-info text-white">Alamat</th>
                                     <td></td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Provinsi</th>
                                     <td>:</td>
                                     <td id="province"></td>
                                 </tr>

                                 <tr>
                                     <th scope="row">Kota/Kabupaten</th>
                                     <td>:</td>
                                     <td id="city"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Nama Jalan</th>
                                     <td>:</td>
                                     <td id="street"></td>
                                 </tr>

                                 <tr>
                                     <th scope="row">Kode Pos</th>
                                     <td>:</td>
                                     <td id="zip_code"></td>
                                 </tr>
                                 <tr>
                                     <th class="bg-info text-white">status</th>
                                     <td>:</td>
                                     <td id="status"></td>
                                 </tr>
                             </tbody>
                         </table>
                     </div><!-- bd -->
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                         data-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div><!-- modal-dialog -->
     </div><!-- modal -->

     <script src="{{ asset('app/employer/index.js') }}"></script>
 @endsection
