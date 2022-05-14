@extends('front.layouts.main')
@section('content')
    <main id="content" role="main">
        @if ($carousels->count())
            <!-- Hero Section -->
            <div class="position-relative border-bottom">
                <!-- Hero Carousel Main -->
                <div id="heroNav" class="js-slick-carousel slick slick-equal-height"
                    data-hs-slick-carousel-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                             "prevArrow": "<span class=\"fas fa-arrow-left d-none d-md-inline-block slick-arrow slick-arrow-soft-white slick-arrow-left slick-arrow-centered-y rounded-circle ml-sm-2 ml-xl-4\"></span>",
                                                                                                                                                                                                                                                                                                                                                                                                                             "nextArrow": "<span class=\"fas fa-arrow-right d-none d-md-inline-block slick-arrow slick-arrow-soft-white slick-arrow-right slick-arrow-centered-y rounded-circle mr-sm-2 mr-xl-4\"></span>",
                                                                                                                                                                                                                                                                                                                                                                                                                             "infinite": true,
                                                                                                                                                                                                                                                                                                                                                                                                                             "autoplay": true,
                                                                                                                                                                                                                                                                                                                                                                                                                             "autoplaySpeed": 10000,
                                                                                                                                                                                                                                                                                                                                                                                                                             "adaptiveHeight": true,
                                                                                                                                                                                                                                                                                                                                                                                                                             "counterSelector": "#slickCounter",
                                                                                                                                                                                                                                                                                                                                                                                                                             "counterDivider": "/",
                                                                                                                                                                                                                                                                                                                                                                                                                             "counterClassMap": {
                                                                                                                                                                                                                                                                                                                                                                                                                               "current": "slick-counter-current",
                                                                                                                                                                                                                                                                                                                                                                                                                               "total": "slick-counter-total",
                                                                                                                                                                                                                                                                                                                                                                                                                               "divider": "slick-counter-divider"
                                                                                                                                                                                                                                                                                                                                                                                                                             },
                                                                                                                                                                                                                                                                                                                                                                                                                             "dots": true,
                                                                                                                                                                                                                                                                                                                                                                                                                             "dotsClass": "slick-pagination slick-pagination-white d-md-none container position-absolute bottom-0 right-0 left-0 justify-content-start mb-6 pl-3 mx-auto"
                                                                                                                                                                                                                                                                                                                                                                                                                           }'>


                    @foreach ($carousels as $carousel)
                        @if (!empty($carousel->image) && file_exists('storage/page/' . $carousel->image))
                            <div class="js-slide gradient-y-overlay-sm-dark bg-img-hero"
                                style="background-image: url({{ asset('storage/page/' . $carousel->image) }});">
                                <!-- Slide #2 -->
                            @elseif(Str::contains($carousel->image, 'https://'))
                                <div class="js-slide gradient-y-overlay-sm-dark bg-img-hero"
                                    style="background-image: url({{ $carousel->image }});">
                                    <!-- Slide #2 -->
                                @else
                                    <div class="js-slide gradient-y-overlay-sm-dark bg-img-hero"
                                        style="background-image: url();">
                                        <!-- Slide #2 -->
                        @endif

                        <div
                            class="container d-md-flex align-items-md-center vh-md-70 space-top-4 space-bottom-3 space-md-0">
                            <div class="w-80 w-lg-50">
                                <h2 class="text-white display-4 mb-0" data-hs-slick-carousel-animation="fadeInUp"
                                    data-hs-slick-carousel-animation-delay="200">
                                    {{ $carousel->title }}
                                </h2>
                                <span class="d-block h3 text-white mb-2" data-hs-slick-carousel-animation="fadeInUp">
                                    <a href="{{ route($carousel->slug) }}" class="btn btn-secondary">Selengkapnya</a>
                                </span>
                            </div>
                        </div>
                        <!-- End Slide #2 -->
                </div>
        @endforeach



        </div>
        <!-- End Hero Carousel Main -->
        <h3 class="text-center display-4 mt-8 mb-8">Cari <span class="text-custom">pekerjaan yang cocok</span>
            untukmu disini!</h3>
        <div class="d-flex align-items-center bg-white position-relative ">
            <form class=" w-lg-85 mx-lg-auto" action="{{ route('vacancy') }}">
                <div class="card p-3 mb-5">
                    <div class="form-row input-group-borderless">

                        <div class="col-sm column-divider-sm-left mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-sm shadow-none"
                                value="{{ request('search') }}" name="search" placeholder="Posisi/perusahaan">
                        </div>
                        <div class="col-sm d-sm-none">
                            <hr class="my-0">
                        </div>
                        <div class="col-sm column-divider-sm-left mb-2 mb-md-0">
                            <input type="text" class="form-control form-control-sm shadow-none"
                                value="{{ request('address') }}" name="address" placeholder="Kota/kabupaten">
                        </div>
                        <div class="col-sm d-sm-none">
                            <hr class="my-0">
                        </div>
                        <div class="col-sm mb-2 mb-md-0">
                            <select class="form-control form-control-sm shadow-none" name="category" id="category">
                                <option value="">Semua jurusan</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}"
                                        {{ request('category') && request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm mb-2 mb-md-0">
                            <select class="form-control form-control-sm shadow-none" name="job_type" id="job_type">
                                <option value="">Semua tipe kerja</option>
                                <option
                                    {{ request('job_type') && request('job_type') == 'Permanent-employment' ? 'selected' : '' }}
                                    value="Permanent-employment">Karyawan tetap (PKWTT)</option>
                                <option
                                    {{ request('job_type') && request('job_type') == 'Fixed-term' ? 'selected' : '' }}
                                    value="Fixed-term">Waktu tertentu (PKWT)</option>
                                <option {{ request('job_type') && request('job_type') == 'Part-time' ? 'selected' : '' }}
                                    value="Part-time">Paruh Waktu</option>
                                <option
                                    {{ request('job_type') && request('job_type') == 'Outsourcing' ? 'selected' : '' }}
                                    value="Outsourcing">Borongan</option>
                                <option
                                    {{ request('job_type') && request('job_type') == 'Internship' ? 'selected' : '' }}
                                    value="Internship">Magang</option>
                            </select>
                        </div>

                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-block btn-custom btn-sm btn-wide"><i
                                    class="fa-solid fa-magnifying-glass mr-1"></i>Cari</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- End Hero Section -->
    @else
        <div class="bg-light">
            <div class="container mb-4">
                <div class="row justify-content-md-between">
                    <div class="col-md-12 space-2 space-bottom-lg-3 space-top-md-5">
                        {{-- <h1 class="text-center mb-5 display-4">Selamat datang di <span class="text-custom">Pusat
                                    Karir
                                    Unmer
                                    Malang,</span> cari pekerjaan yang cocok
                                untukmu disini!</h1> --}}
                        <h3 class="text-center display-2 mb-5 display-4">Cari <span class="text-custom">pekerjaan
                                yang
                                cocok</span>
                            untukmu disini!</h3>
                        {{-- <h1 class="text-center mb-5 display-4">Selamat datang di <span class="text-custom">Pusat
                                    Karir
                                    Unmer
                                    Malang,</span> cari pekerjaan yang cocok
                                untukmu disini!</h1> --}}
                        <form class=" w-lg-85 mx-lg-auto" action="{{ route('vacancy') }}">
                            <div class="card p-3 mb-5">
                                <div class="form-row input-group-borderless">

                                    <div class="col-sm column-divider-sm-left mb-2 mb-md-0">
                                        <input type="text" class="form-control form-control-sm shadow-none"
                                            value="{{ request('search') }}" name="search"
                                            placeholder="Posisi/perusahaan">
                                    </div>
                                    <div class="col-sm d-sm-none">
                                        <hr class="my-0">
                                    </div>
                                    <div class="col-sm column-divider-sm-left mb-2 mb-md-0">
                                        <input type="text" class="form-control form-control-sm shadow-none"
                                            value="{{ request('address') }}" name="address" placeholder="Kota/kabupaten">
                                    </div>
                                    <div class="col-sm d-sm-none">
                                        <hr class="my-0">
                                    </div>
                                    <div class="col-sm mb-2 mb-md-0">
                                        <select class="form-control form-control-sm shadow-none" name="category"
                                            id="category">
                                            <option value="">Semua jurusan</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->slug }}"
                                                    {{ request('category') && request('category') == $category->slug ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm mb-2 mb-md-0">
                                        <select class="form-control form-control-sm shadow-none" name="job_type"
                                            id="job_type">
                                            <option value="">Semua tipe kerja</option>
                                            <option
                                                {{ request('job_type') && request('job_type') == 'Permanent-employment' ? 'selected' : '' }}
                                                value="Permanent-employment">Karyawan tetap (PKWTT)</option>
                                            <option
                                                {{ request('job_type') && request('job_type') == 'Fixed-term' ? 'selected' : '' }}
                                                value="Fixed-term">Waktu tertentu (PKWT)</option>
                                            <option
                                                {{ request('job_type') && request('job_type') == 'Part-time' ? 'selected' : '' }}
                                                value="Part-time">Paruh Waktu</option>
                                            <option
                                                {{ request('job_type') && request('job_type') == 'Outsourcing' ? 'selected' : '' }}
                                                value="Outsourcing">Borongan</option>
                                            <option
                                                {{ request('job_type') && request('job_type') == 'Internship' ? 'selected' : '' }}
                                                value="Internship">Magang</option>
                                        </select>
                                    </div>

                                    <div class="col-md-auto">
                                        <button type="submit" class="btn btn-block btn-custom btn-sm btn-wide"><i
                                                class="fa-solid fa-magnifying-glass mr-1"></i>Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Apps Section -->
        <div class="container space-sm-2 space-bottom-lg-3">
            {{-- <div class="container space-top-1 space-top-md-2 space-bottom-2 space-bottom-lg-3"> --}}
            <div class="careers mb-8">
                <section class="latest-job mb-8">
                    <!-- Title -->
                    <div class="mb-5  text-center justify-content-between align-items-center">
                        <h2 class="mb-0">Lowongan Kerja</h2>
                    </div>
                    <!-- End Title -->

                    <!-- Slick Carousel Kerja -->
                    <div class="js-slick-carousel slick slick-gutters-2 z-index-2"
                        data-hs-slick-carousel-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                        "slidesToShow": 4,
                                                                                                                                                                                                                                                                                                                                                                                                                        "dots": true,
                                                                                                                                                                                                                                                                                                                                                                                                                        "dotsClass": "slick-pagination mt-4 d-lg-none",
                                                                                                                                                                                                                                                                                                                                                                                                                        "responsive": [{
                                                                                                                                                                                                                                                                                                                                                                                                                        "breakpoint": 1200,
                                                                                                                                                                                                                                                                                                                                                                                                                        "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                        "slidesToShow": 4
                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                        }, {
                                                                                                                                                                                                                                                                                                                                                                                                                        "breakpoint": 992,
                                                                                                                                                                                                                                                                                                                                                                                                                        "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                        "slidesToShow": 3
                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                        }, {
                                                                                                                                                                                                                                                                                                                                                                                                                        "breakpoint": 768,
                                                                                                                                                                                                                                                                                                                                                                                                                        "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                        "slidesToShow": 2
                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                        }, {
                                                                                                                                                                                                                                                                                                                                                                                                                        "breakpoint": 554,
                                                                                                                                                                                                                                                                                                                                                                                                                        "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                        "slidesToShow": 1
                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                        }]
                                                                                                                                                                                                                                                                                                                                                                                                                        }'>
                        @if ($job_vacancies->count())
                            @foreach ($job_vacancies as $vacancy)
                                <div class="js-slide mt-1">
                                    <!-- Card -->
                                    <div class="card card-frame h-100">
                                        <div class="card-header bg-soft-warning text-center rounded-top">
                                            <div class=" d-flex rounded p-2 mx-auto justify-content-center">
                                                <a
                                                    href="{{ route('employer.profile', $vacancy->employers->user->username) }}">
                                                    @if (!empty($vacancy->employers->logo) && file_exists('storage/logo/' . $vacancy->employers->logo))
                                                        <img class="avatar-img"
                                                            src="{{ asset('storage/logo/' . $vacancy->employers->logo) }}"
                                                            alt="Image Description">
                                                    @else
                                                        <img class="avatar-img"
                                                            src="https://ui-avatars.com/api/?name={{ $vacancy->employers->company_name }}"
                                                            alt="Image Description">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-1">
                                                <a href="{{ route('vacancy.description', $vacancy->slug) }}"
                                                    class="d-block text-dark font-weight-bold">{{ $vacancy->job_title }}</a>
                                                <a href="{{ route('employer.profile', $vacancy->employers->user->username) }}"
                                                    class="text-body font-size-1">{{ $vacancy->employers->company_name }}</a>
                                            </div>
                                            @foreach ($vacancy->categories as $category)
                                                <span class="badge badge-secondary mb-1">
                                                    {{ $category->name }}</span>
                                            @endforeach
                                            <span class="d-block text-body  mb-2">
                                                <i class="fa-solid fa-map-pin mr-1"></i>
                                                {{ $vacancy->address->city->name }}
                                            </span>
                                            <span class="d-block text-body  mb-2">
                                                <i class="fa-solid fa-briefcase mr-1"></i>
                                                {{ $vacancy->job_type }}
                                            </span>
                                            <span class="d-block text-body  mb-2">
                                                <i class="fa-solid fa-clock mr-1"></i>
                                                {{ !empty($vacancy->created_at) ? $vacancy->created_at->diffForHumans() : '' }}
                                            </span>
                                            <hr class="">
                                            <div class="media mt-2">

                                                <a href="{{ route('vacancy.description', $vacancy->slug) }}"
                                                    class="btn btn-sm btn-custom btn-block"><i
                                                        class="fa-solid fa-circle-info mr-1"></i></i>Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card -->

                                    <!-- End Card -->
                                </div>
                            @endforeach
                        @else
                            <p>Lowongan kerja tidak ditemukan</p>
                        @endif
                    </div>
                    <!-- End Slick Carousel -->
                </section>

                <section class="magang mb-6">
                    <!-- Title -->
                    <div class="mb-5  text-center justify-content-between align-items-center">
                        <h2 class="mb-0">Lowongan Magang</h2>
                    </div>
                    <!-- End Title -->

                    <!-- Slick Carousel Magang -->
                    <div class="js-slick-carousel slick slick-gutters-2 z-index-2"
                        data-hs-slick-carousel-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "slidesToShow": 4,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "dots": true,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "dotsClass": "slick-pagination d-lg-none mt-4",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "responsive": [{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "breakpoint": 1200,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "slidesToShow": 4
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }, {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "breakpoint": 992,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "slidesToShow": 3
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }, {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "breakpoint": 768,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "slidesToShow": 2
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }, {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "breakpoint": 554,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "slidesToShow": 1
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }]
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }'>
                        @if ($job_internships->count())
                            @foreach ($job_internships as $internship)
                                <div class="js-slide mt-1">
                                    <!-- Card -->
                                    <div class="card card-frame h-100">
                                        <div class="card-header bg-soft-primary text-center rounded-top">
                                            <div class=" d-flex rounded p-2 mx-auto justify-content-center">
                                                <a href="">
                                                    @if (!empty($internship->employers->logo) && file_exists('storage/logo/' . $internship->employers->logo))
                                                        <img class="avatar-img"
                                                            src="{{ asset('storage/logo/' . $internship->employers->logo) }}"
                                                            alt="Logo">
                                                    @else
                                                        <img class="avatar-img"
                                                            src="https://ui-avatars.com/api/?name={{ $internship->employers->company_name }}"
                                                            alt="Logo">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <a href="{{ route('vacancy.description', $internship->slug) }}"
                                                    class="d-block text-dark font-weight-bold">{{ $internship->job_title }}</a>
                                                <a href="{{ route('employer.profile', $internship->employers->user->username) }}"
                                                    class="text-body font-size-1">{{ $internship->employers->company_name }}</a>
                                            </div>
                                            @foreach ($internship->categories as $category)
                                                <span class="badge badge-secondary mb-1">
                                                    {{ $category->name }}</span>
                                            @endforeach
                                            <span class="d-block text-body  mb-2">
                                                <i class="fa-solid fa-map-pin mr-1"></i>
                                                {{ $internship->address->city->name }}
                                            </span>
                                            <span class="d-block text-body  mb-2">
                                                <i class="fa-solid fa-briefcase mr-1"></i>
                                                {{ $internship->job_type }}
                                            </span>
                                            <span class="d-block text-body  mb-2">
                                                <i class="fa-solid fa-clock mr-1"></i>
                                                {{ !empty($internship->created_at) ? $internship->created_at->diffForHumans() : '' }}
                                            </span>
                                            <hr class="">
                                            <div class="media mt-2">

                                                <a href="{{ route('vacancy.description', $internship->slug) }}"
                                                    class="btn btn-sm btn-custom btn-block"><i
                                                        class="fa-solid fa-circle-info mr-1"></i></i>Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Card -->

                                    <!-- End Card -->
                                </div>
                            @endforeach
                        @else
                            <p>Lowongan magang tidak ditemukan</p>
                        @endif
                    </div>
                    <!-- End Magang Slick Carousel -->
                </section>
                <!-- Info -->
                <div class="position-relative z-index-2 text-center">
                    <div class="d-inline-block font-size-1 border bg-white text-center rounded-pill py-3 px-4">
                        <a class="font-weight-bold ml-3" href="{{ route('vacancy') }}">LIHAT SEMUA LOWONGAN </a>
                    </div>
                </div>
                <!-- End Info -->
            </div>


            <!-- Title -->
            <div class="mb-5  text-center justify-content-between align-items-center">
                <h2 class="mb-0">Artikel Terbaru</h2>
            </div>
            <!-- End Title -->
            <section class="latest-news mb-8">
                {{-- <div class="js-slick-carousel slick slick-equal-height slick-gutters-3 slick-center-mode-right slick-center-mode-right-offset" --}}
                <!-- Slick Carousel -->
                <div class="js-slick-carousel slick slick-equal-height  slick-gutters-3"
                    data-hs-slick-carousel-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                            "prevArrow": "<span class=\"fa fa-arrow-left slick-arrow slick-arrow-primary-white slick-arrow-left slick-arrow-centered-y shadow-soft rounded-circle ml-n2\"></span>",
                                                                                                                                                                                                                                                                                                                                                                                                                            "nextArrow": "<span class=\"fa fa-arrow-right slick-arrow slick-arrow-primary-white slick-arrow-right slick-arrow-centered-y shadow-soft rounded-circle mr-n2\"></span>",
                                                                                                                                                                                                                                                                                                                                                                                                                            "slidesToShow": 3,
                                                                                                                                                                                                                                                                                                                                                                                                                            "infinite": true,
                                                                                                                                                                                                                                                                                                                                                                                                                            "dots": true,
                                                                                                                                                                                                                                                                                                                                                                                                                            "dotsClass": "slick-pagination mt-4 slick-pagination-white d-none mt-5",
                                                                                                                                                                                                                                                                                                                                                                                                                            "responsive": [{
                                                                                                                                                                                                                                                                                                                                                                                                                            "breakpoint": 992,
                                                                                                                                                                                                                                                                                                                                                                                                                            "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                            "slidesToShow": 2
                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                            }, {
                                                                                                                                                                                                                                                                                                                                                                                                                            "breakpoint": 768,
                                                                                                                                                                                                                                                                                                                                                                                                                            "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                            "slidesToShow": 2
                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                            }, {
                                                                                                                                                                                                                                                                                                                                                                                                                            "breakpoint": 554,
                                                                                                                                                                                                                                                                                                                                                                                                                            "settings": {
                                                                                                                                                                                                                                                                                                                                                                                                                            "slidesToShow": 1
                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                            }]
                                                                                                                                                                                                                                                                                                                                                                                                                            }'>

                    @if (!empty($articles) && $articles->count())
                        @foreach ($articles as $article)
                            <div class="js-slide mt-1">
                                <!-- Card Info -->
                                <div class="card h-100">
                                    @if (!empty($article->thumbnail) && file_exists('storage/article/' . $article->thumbnail))
                                        <img class="card-img-top"
                                            src="{{ asset('storage/article/' . $article->thumbnail) }}" alt="Thumbnail">
                                    @elseif(Str::contains($article->thumbnail, 'https://'))
                                        <img class="card-img-top" src="{{ $article->thumbnail }}" alt="Thumbnail">
                                    @else
                                        <img class="card-img-top"
                                            src="{{ asset('storage/article/no-thumbnail.jpg') }}" alt="Thumbnail">
                                    @endif

                                    <div class="card-body">
                                        <small
                                            class="d-block small font-weight-bold text-cap mb-2">{{ $article->category->name }}</small>
                                        <div class="mb-3">
                                            <h3>
                                                <a class="text-inherit"
                                                    href="{{ route('article.read', $article->slug) }}">{{ $article->title }}</a>
                                            </h3>
                                        </div>
                                        <p class="mb-4">{!! strip_tags(substr($article->content, 0, 100)) . '...' !!}</p>
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="d-flex align-items-center ml-auto">
                                                <div class="small text-muted">
                                                    <i class="fa fa-user d-block d-sm-inline-block mb-1 mb-sm-0 mr-1"></i>
                                                    {{ ucfirst(strtok($article->user->email, '@')) }}
                                                </div>
                                                <small class="text-muted mx-2">|</small>
                                                <div class="small text-muted">
                                                    <i class="fa fa-clock d-block d-sm-inline-block mb-1 mb-sm-0 mr-1"></i>
                                                    {{ $article->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 pt-0">
                                        <a class="font-weight-bold"
                                            href="{{ route('article.read', $article->slug) }}">Selengkapnya <i
                                                class="fa fa-angle-right fa-sm ml-1"></i></a>
                                    </div>
                                </div>
                                <!-- End Card Info -->
                            </div>
                        @endforeach
                    @else
                        <p>Artikel tidak ditemukan</p>
                    @endif
                </div>
            </section>
            <!-- End Slick Carousel -->
            <!-- Info -->
            <div class="position-relative z-index-2 text-center mb-4">
                <div class="d-inline-block font-size-1 border bg-white text-center rounded-pill py-3 px-4">
                    <a class="font-weight-bold ml-3" href="{{ route('article') }}">LIHAT
                        SEMUA ARTIKEL </a>
                </div>
            </div>
            <!-- End Info -->
        </div>
        <!-- End Apps Section -->
    </main>
@endsection
