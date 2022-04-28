    @extends('front.layouts.main')
    @section('content')
        <main id="content" role="main">
            <!-- Article Section -->
            <div class="container space-2 space-lg-3">
                {{-- <div class="row justify-content-lg-between align-items-lg-center"> --}}
                <div class="w-lg-80 text-center mx-lg-auto">
                    <div class="mb-5 mb-md-11">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                        <!-- Jobs Link -->
                        <div class="mb-5">
                            <a href="javascript:void(0)" class="font-weight-bold" onclick="history.back()">
                                <i class="fas fa-angle-left fa-sm mr-1"></i>
                                Kembali
                            </a>
                        </div>
                        <table id="datatable" class="table display responsive nowrap category-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pelamar</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Tanggal Lamar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- End Jobs Link -->
                    </div>
                </div>
            </div>
            <!-- End Article Section -->
        </main>

        <!-- Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalTitle">Detail Pelamar</h5>
                        <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal"
                            aria-label="Close">
                            <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                            </svg>
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
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
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
                        <h5 class="modal-title" id="detailModalTitle">Pelamar Diterima</h5>
                        <button type="button" class="btn btn-xs btn-icon btn-soft-secondary" data-dismiss="modal"
                            aria-label="Close">
                            <svg aria-hidden="true" width="10" height="10" viewBox="0 0 18 18"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                            </svg>
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
                        <button type="button" id="btnStore" onclick="accepted()" class="btn btn-sm btn-custom">Submit<i
                                class="fa fa-angle-right fa-sm ml-1"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('app/applicant/applicant-employer.js') }}"></script>
    @endsection
