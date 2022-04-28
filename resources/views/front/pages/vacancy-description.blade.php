@extends('front.layouts.main')
@section('content')
    <main id="content" role="main">
        <!-- Content Section -->
        <div class="container space-top-3 space-top-lg-3 space-bottom-1 space-bottom-md-2">
            <div class="row">
                {{-- <div id="stickyBlockStartPoint" class="col-lg-4 mt-lg-n11 mb-7 mb-lg-0"> --}}
                <div id="stickyBlockStartPoint" class="col-md-5 col-lg-4 mb-7  mb-md-0">
                    <!-- Sidebar Content -->
                    <div class="js-sticky-block card bg-white"
                        data-hs-sticky-block-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "parentSelector": "#stickyBlockStartPoint",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "startPoint": "#stickyBlockStartPoint",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "endPoint": "#stickyBlockEndPoint",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "stickyOffsetTop": 24,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        "stickyOffsetBottom": 24
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }'>
                        <div class="card-header text-center py-5">
                            <div class="max-w-27rem mx-auto mb-3">
                                @if (!empty($vacancy->employers->logo) && file_exists('storage/logo/' . $vacancy->employers->logo))
                                    <img class="img-fluid rounded"
                                        src="{{ asset('storage/logo/' . $vacancy->employers->logo) }}"
                                        alt="Image Description">
                                @else
                                    <img class="img-fluid"
                                        src="https://ui-avatars.com/api/?name={{ $vacancy->employers->company_name }}"
                                        alt="Image Description">
                                @endif
                            </div>
                            <h4>{{ $vacancy->employers->company_name }}
                                @if ($vacancy->employers->status == 'Verified')
                                    <i class="fa-solid fa-circle-check ml-1 text-custom"></i>
                                @endif
                            </h4>
                            <span class="d-block text-muted font-size-1">
                                {{ $vacancy->employers->category->name }}</span>
                            <span class="d-block text-body font-size-1 mt-1"><i
                                    class="fa-solid fa-location-dot mr-2"></i></i>
                                {{ $vacancy->employers->address->city->name . ', ' . $vacancy->employers->address->province->name }}</span>
                        </div>
                        <div class="card-body text-center">
                            <div class="border-bottom pb-2 mb-3 text-left">
                                <h1 class="h4 mb-3">Kontak</h1>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 mb-3">
                                        <!-- Social Profiles -->
                                        <a class="media" href="#">
                                            <div class="icon icon-xs icon-soft-secondary mr-3">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div class="media-body">
                                                <span
                                                    class="d-block font-size-1 font-weight-bold display-2">{{ $vacancy->employers->telp }}</span>
                                            </div>
                                        </a>
                                        <!-- End Social Profiles -->
                                    </div>
                                    @if (!empty($vacancy->employers->website))
                                        <div class="col-12 col-md-12 col-lg-12 mb-0 mb-md-4 mb-lg-0">
                                            <!-- Social Profiles -->
                                            <a class="media" href="{{ $vacancy->employers->website }}"
                                                target="_blank">
                                                <div class="icon icon-xs icon-soft-secondary mr-3">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span
                                                        class="d-block font-size-1 font-weight-bold">{{ $vacancy->employers->website }}</span>
                                                </div>
                                            </a>
                                            <!-- End Social Profiles -->
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-0">
                                <a class="btn btn-xs btn-custom transition-3d-hover"
                                    href="{{ route('employer.profile', $vacancy->employers->user->username) }}">
                                    {{-- <i class="fa-solid fa-gauge mr-2"></i> --}}
                                    <i class="fa-solid fa-user  mr-2"></i>
                                    Lihat Profil
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Sidebar Content -->
                </div>

                <div class="col-md-7 col-lg-8">
                    <div class="ml-lg-6">
                        <!-- Title -->
                        <div class="row justify-content-sm-between align-items-sm-center mb-5">
                            <div class="col-sm mb-3 mb-sm-0">
                                <h1 class="h2">{{ $vacancy->job_title }}</h1>
                                @foreach ($vacancy->categories as $category)
                                    <span class="badge badge-secondary">
                                        {{ $category->name }}</span>
                                @endforeach
                                {{ ' - ' .$vacancy->job_type .' - ' .$vacancy->address->city->name .', ' .$vacancy->address->province->name }}
                                <p class="mt-3"> Dipublish
                                    {{ !empty($vacancy->created_at) ? $vacancy->created_at->diffForHumans() : '' }} |
                                    Berakhir
                                    {{ date('d', strtotime($vacancy->expiry_date)) .' ' .date('M', strtotime($vacancy->expiry_date)) .' ' .date('Y', strtotime($vacancy->expiry_date)) }}
                                </p>
                            </div>


                            <div class="col-sm-auto text-right">
                                @auth
                                    @if (Auth::user()->hasRole('seeker'))
                                        <a href="{{ route('application', [Auth::user()->username, $vacancy->slug]) }}"
                                            class="btn btn-sm btn-info"><i class="fa-solid fa-file-import mr-1"></i></i> Lamar
                                            sekarang</a>
                                    @endif
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-file-import mr-1"></i></i> Lamar
                                        sekarang</a>
                                @endguest
                            </div>
                        </div>
                        <!-- End Title -->

                        <h3 class="mt-8"> Deskripsi Pekerjaan : </h3>
                        <p class="mt-5">{!! $vacancy->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Section -->

        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>

        <!-- Stories Section -->
        <div class="container space-2 space-lg-3 border-top">
            <!-- Title -->
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>Lowongan lain di perusahaan ini</h2>
            </div>
            <!-- End Title -->

            <div class="row">
                @if ($vacancy_employers->count())
                    @foreach ($vacancy_employers as $vacancy_employer)
                        <div class="col-sm-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                            <!-- Card -->
                            <div class="card card-frame h-100">
                                <div class="card-header bg-soft-warning text-center rounded-top">
                                    <div class=" d-block rounded p-2 mx-auto">
                                        <a href="">
                                            @if (!empty($vacancy_employer->employers->logo) && file_exists('storage/logo/' . $vacancy_employer->employers->logo))
                                                <img class="avatar-img"
                                                    src="{{ asset('storage/logo/' . $vacancy_employer->employers->logo) }}"
                                                    alt="Image Description">
                                            @else
                                                <img class="avatar-img"
                                                    src="https://ui-avatars.com/api/?name={{ $vacancy_employer->employers->company_name }}"
                                                    alt="Image Description">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-1">
                                        <a href="{{ route('vacancy.description', $vacancy_employer->slug) }}"
                                            class="d-block text-dark font-weight-bold">{{ $vacancy_employer->job_title }}</a>
                                        <a href=""
                                            class="text-body font-size-1">{{ $vacancy_employer->employers->company_name }}</a>
                                    </div>
                                    @foreach ($vacancy_employer->categories as $category)
                                        <span class="badge badge-secondary mb-1">
                                            {{ $category->name }}</span>
                                    @endforeach
                                    <span class="d-block text-body  mb-2">
                                        <i class="fa-solid fa-map-pin mr-1"></i>
                                        {{ $vacancy_employer->address->city->name }}
                                    </span>
                                    <span class="d-block text-body  mb-2">
                                        <i class="fa-solid fa-briefcase mr-1"></i>
                                        {{ $vacancy_employer->job_type }}
                                    </span>
                                    <span class="d-block text-body  mb-2">
                                        <i class="fa-solid fa-clock mr-1"></i>
                                        {{ !empty($vacancy_employer->created_at) ? $vacancy_employer->created_at->diffForHumans() : '' }}
                                    </span>
                                    <hr class="">
                                    <div class="media mt-2">
                                        <a href="{{ route('vacancy.description', $vacancy_employer->slug) }}"
                                            class="btn btn-sm btn-custom btn-block"><i
                                                class="fa-solid fa-circle-info mr-1"></i></i>Detail</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    @endforeach
                @else
                    <p>Lowongan tidak ditemukan</p>
                @endif
            </div>
            <!-- Info -->
            <div class="position-relative z-index-2 text-center">
                <div class="d-inline-block font-size-1 border bg-white text-center rounded-pill py-3 px-4">
                    <a class="font-weight-bold ml-3" href="{{ route('vacancy') }}">LIHAT SEMUA LOWONGAN </a>
                </div>
            </div>
            <!-- End Info -->
        </div>
        <!-- End Stories Section -->
    </main>
@endsection
