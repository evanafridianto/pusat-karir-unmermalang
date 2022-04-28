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
                             <th>Nama Lengkap</th>
                             <th>Gender</th>
                             <th>Pdk. Terakhir</th>
                             <th>Jurusan</th>
                             <th>Universitas</th>
                             <th>Kota</th>
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
                     <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title-form-category">Detail Pencari Kerja
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
                                     <th class="bg-info text-white">Profil</th>
                                     <td></td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Foto Profil</th>
                                     <td>:</td>
                                     <td id="logo"><img class="img-thumbnail wd-120 ht-120 edit-thumbnail" src=""></img>
                                     </td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Nama Depan</th>
                                     <td>:</td>
                                     <td id="first_name"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Nama Belakang</th>
                                     <td>:</td>
                                     <td id="last_name"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Tanggal Lahir</th>
                                     <td>:</td>
                                     <td id="date_of_birth"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Gender</th>
                                     <td>:</td>
                                     <td id="gender"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Status Kawin</th>
                                     <td>:</td>
                                     <td id="marital_status"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Telp</th>
                                     <td>:</td>
                                     <td id="telp"></td>
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
                                     <th class="bg-info text-white">Pendidikan</th>
                                     <td></td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Pendidikan Terakhir</th>
                                     <td>:</td>
                                     <td id="last_education"></td>
                                 </tr>

                                 <tr>
                                     <th scope="row">Jurusan</th>
                                     <td>:</td>
                                     <td id="major"></td>
                                 </tr>
                                 <tr>
                                     <th scope="row">Universitas</th>
                                     <td>:</td>
                                     <td id="institute_name"></td>
                                 </tr>

                                 <tr>
                                     <th scope="row">Tahun Lulus</th>
                                     <td>:</td>
                                     <td id="graduation_year"></td>
                                 </tr>

                                 <tr>
                                     <th scope="row">IPK</th>
                                     <td>:</td>
                                     <td id="gpa"></td>
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


     <script src="{{ asset('app/seeker/index.js') }}"></script>
 @endsection
