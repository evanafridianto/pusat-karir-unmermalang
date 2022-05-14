@extends('front.layouts.main')
@section('content')
    <main id="content" role="main">

        <div class="container space-top-3 space-top-lg-3 space-bottom-1 space-bottom-md-2">
            <div class="w-lg-80 text-center mx-lg-auto">
                <div class="mb-5 mb-md-11">
                    <h1>{{ $title }}</h1>
                    {{-- <h3 class="display-4">{{ $title }}</h3> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Sorting -->
                    <div class="row align-items-center mb-5 sorting">
                        <div class="col-lg-12 align-self-lg-end text-lg-right">
                            <form class=" w-lg-85 mx-lg-auto">
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
                                                value="{{ request('address') }}" name="address"
                                                placeholder="Kota/kabupaten">
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
                                                    {{-- @endif --}}
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
                    <!-- End Sorting -->

                    <!-- Careers -->
                    <div class="row mx-n2 mb-5 careers">
                        @if ($vacancies->count())
                            @foreach ($vacancies as $vacancy)
                                <div class="col-sm-6 col-lg-3 px-2 px-sm-3 mb-3 mb-sm-5">
                                    <!-- Card -->

                                    <div class="card card-frame h-100">
                                        <div class="card-header bg-soft-warning text-center rounded-top">
                                            <div class=" d-block rounded p-2 mx-auto">
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
                                </div>
                            @endforeach
                        @else
                            <p>Lowongan tidak ditemukan</p>
                        @endif
                    </div>
                    <!-- End Careers -->

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0 justify-content-center">
                            {{ $vacancies->links() }}
                        </ul>
                    </nav>
                    <!-- End Pagination -->

                    <!-- Divider -->
                    <div class="d-lg-none">
                        <hr class="my-7 my-sm-11">
                    </div>
                    <!-- End Divider -->
                </div>
            </div>
        </div>

    </main>
@endsection
