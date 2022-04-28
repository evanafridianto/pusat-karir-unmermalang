@extends('admin.layouts.main')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class=" ion-briefcase tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                TOTAL LOWONGAN</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $vacancy_count }}</p>
                        </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="bg-purple rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="icon ion-laptop tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">TOTAL
                                PERUSAHAAN</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $employer_count }}</p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class=" ion-ios-people tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">TOTAL PENCARI
                                KERJA</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $seeker_count }}</p>
                        </div>
                    </div>
                    <div id="ch2" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion-ios-paper tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                TOTAL ARTIKEL</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $article_count }}</p>
                        </div>
                    </div>
                    <div id="ch4" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
        </div><!-- row -->
        <div class="row row-sm mg-t-20">
            <div class="col-lg-8">
                <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Statistik Pelamar/Jurusan
                            </h6>
                        </div>
                    </div><!-- d-flex -->
                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <div class="bd pd-20">
                            <canvas id="chartPie" height="200"></canvas>
                        </div>
                    </div>
                </div><!-- card -->
            </div><!-- col-8 -->
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <div class="card bg-danger bd-0 mg-b-20">
                    <div class="pd-x-25 pd-t-25">
                        <h6 class="tx-13 tx-uppercase tx-white tx-medium tx-spacing-1 mg-b-10">MEMBERSHIP</h6>
                        <div class="row row-sm mg-t-20">
                            <div class="col">
                                <h4 class="tx-lato tx-white tx-bold tx-normal mg-b-0">{{ $employer_membership_count }}
                                </h4>
                                <span class="tx-12 tx-white-6 tx-roboto">PERUSAHAAN</span>
                            </div><!-- col -->
                            <div class="col mg-b-10">
                                <h4 class="tx-lato tx-white tx-normal mg-b-0">{{ $seeker_membership_count }}</h4>
                                <span class="tx-12 tx-white-6 tx-roboto">PENCARI KERJA</span>
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- pd-x-25 -->
                </div><!-- card -->

                <div class="card shadow-base bd-0 overflow-hidden">
                    <div class="pd-x-25 pd-t-25 ">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1 mg-b-20">POSTINGAN LOWONGAN
                        </h6>
                        <div class="text-center">
                            <h1 class="tx-56 tx-light tx-inverse mg-b-0 ">{{ $vacancy_today }}</h1>
                            <p>HARI INI</p>
                        </div>
                    </div><!-- pd-x-25 -->
                    <div class="bg-teal pd-x-25 pd-b-25 d-flex justify-content-between">
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">{{ $vacancy_yesterday }}</h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Kemarin
                            </p>
                        </div>
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">{{ $vacancy_lastweek }}</h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Minggu lalu
                            </p>
                        </div>
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">{{ $vacancy_lastmonth }}</h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Bulan lalu
                            </p>
                        </div>
                    </div>
                </div><!-- card -->

                <div class="card shadow-base bd-0 mg-t-20">
                    <div class="pd-x-25 pd-t-25 ">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1 mg-b-20">POSTINGAN ARTIKEL
                        </h6>
                        <div class="text-center">
                            <h1 class="tx-56 tx-light tx-inverse mg-b-0 ">{{ $article_today }}</h1>
                            <p>HARI INI</p>
                        </div>
                    </div><!-- pd-x-25 -->
                    <div class="bg-primary pd-x-25 pd-b-25 d-flex justify-content-between">
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">{{ $article_yesterday }}</h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Kemarin
                            </p>
                        </div>
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">{{ $article_lastweek }}</h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Minggu lalu
                            </p>
                        </div>
                        <div class="tx-center">
                            <h3 class="tx-lato tx-white mg-b-5">{{ $article_lastmonth }}</h3>
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Bulan lalu
                            </p>
                        </div>
                    </div>
                </div><!-- card -->
            </div><!-- col-4 -->
            <div class="col-lg-6">
                <div class="card shadow-base bd-0 pd-25 mg-t-20">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Jumlah Pelamar/Kota-Kabupaten
                            </h6>
                        </div>
                    </div><!-- d-flex -->

                    <div class="table-wrapper">
                        <table id="datatable" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kota/Kabupaten</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>
            <div class="col-lg-6">
                <div class="card shadow-base bd-0 pd-25 mg-t-20">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Jumlah
                                Perusahaan/Kota-Kabupaten
                            </h6>
                        </div>
                    </div><!-- d-flex -->

                    <div class="table-wrapper">
                        <table id="datatableemployer" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kota/Kabupaten</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>

        </div><!-- row -->
    </div><!-- br-pagebody -->
    <script src="{{ asset('app/dashboard/dashboard.js') }}"></script>
@endsection
