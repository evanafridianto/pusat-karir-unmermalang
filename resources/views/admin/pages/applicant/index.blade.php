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
                 <div class="table-wrapper">
                     <table id="datatable" class="table display responsive nowrap category-table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 {{-- <th>Nama Member</th> --}}
                                 <th>Nama Depan</th>
                                 <th>Nama Belakang</th>
                                 <th>Posisi</th>
                                 <th>Perusahaan</th>
                                 <th>Pesan</th>
                                 <th>Tanggal Lamar</th>
                                 <th>Status</th>
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

     <!-- Modal -->
     <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title-form-category">Detail Pelamar
                     </h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <!-- Basics Accordion -->
                     <div id="basicsAccordion">
                         <!-- Card -->
                         <div class="card mb-3">
                             <div class="card-header card-collapse" id="basicsHeadingOne">
                                 <h5 class="mb-0">
                                     <button type="button"
                                         class="btn btn-link btn-block d-flex justify-content-between card-btn p-3"
                                         data-toggle="collapse" data-target="#basicsCollapseOne" aria-expanded="true"
                                         aria-controls="basicsCollapseOne">
                                         Dokumen Pelamar

                                         <span class="card-btn-toggle">
                                             <span class="card-btn-toggle-default">+</span>
                                             <span class="card-btn-toggle-active">−</span>
                                         </span>
                                     </button>
                                 </h5>
                             </div>
                             <div id="basicsCollapseOne" class="collapse show" aria-labelledby="basicsHeadingOne"
                                 data-parent="#basicsAccordion">
                                 <div class="card-body">
                                     <table class="table">
                                         <tbody>
                                             <tr>
                                                 <th scope="row">Posisi Lamaran</th>
                                                 <td>:</td>
                                                 <td id="job_title"></td>
                                             </tr>
                                             <tr>
                                                 <th scope="row">File Lamaran</th>
                                                 <td>:</td>
                                                 <td id="documents">

                                                 </td>
                                             </tr>
                                             <tr>
                                                 <th scope="row">Pesan</th>
                                                 <td>:</td>
                                                 <td id="message"></td>
                                             </tr>
                                             <tr>
                                                 <th scope="row">Status</th>
                                                 <td>:</td>
                                                 <td id="status"></td>
                                             </tr>

                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                         <!-- End Card -->

                         <!-- Card -->
                         <div class="card mb-3">
                             <div class="card-header card-collapse" id="basicsHeadingTwo">
                                 <h5 class="mb-0">
                                     <button type="button"
                                         class="btn btn-link btn-block d-flex justify-content-between card-btn collapsed p-3"
                                         data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false"
                                         aria-controls="basicsCollapseTwo">
                                         Profil Pelamar
                                         <span class="card-btn-toggle">
                                             <span class="card-btn-toggle-default">+</span>
                                             <span class="card-btn-toggle-active">−</span>
                                         </span>
                                     </button>
                                 </h5>
                             </div>
                             <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                                 data-parent="#basicsAccordion">
                                 <div class="card-body">
                                     <table class="table">
                                         <tbody>
                                             <tr>
                                                 <th class="bg-info text-white">Profil</th>
                                                 <td></td>
                                                 <td></td>
                                             </tr>
                                             <tr>
                                                 <th scope="row">Foto Profil</th>
                                                 <td>:</td>
                                                 <td id="logo">

                                                     <img class="img-fluid rounded" src="" alt="Logo" width="120"
                                                         height="120">
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
                                 </div>
                             </div>
                         </div>
                         <!-- End Card -->

                         <!-- End Card -->
                     </div>
                     <!-- End Basics Accordion -->
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                         data-dismiss="modal">Tutup</button>
                 </div>
             </div>
         </div>
     </div>


     <!-- Modal -->
     <div class="modal fade" id="acceptedModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="detailModalTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" id="title-form-category">Pelamar Diterima
                     </h6>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form id="accepted">
                         <div class="row">
                             <div class="col-sm-12">
                                 <!-- Form Group -->
                                 <div class="form-group">
                                     <label class="input-label">Pesan </label>
                                     <input type="hidden" name="applicant_id">
                                     <textarea name="message" class="form-control  form-control-sm" required
                                         placeholder="Selamat anda diterima, jadwal interview akan..."
                                         rows="8"></textarea>
                                     <small class="text-danger"></small>
                                 </div>
                                 <!-- End Form Group -->
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="modal-footer">

                     <button type="button" id="btn-spinner"
                         class="btn btn-custom tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" onclick="accepted()"
                         id="btn-spinner2"><i class="fa fa-paper-plane mg-r-10"></i>Simpan</button>
                 </div>
             </div>
         </div>
     </div>

     <script src="{{ asset('app/applicant/index.js') }}"></script>
 @endsection
