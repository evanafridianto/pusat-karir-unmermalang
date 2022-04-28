@extends('front.layouts.main')
@section('content')
    <!-- ========== MAIN ========== -->
    <main id="content" role="main">
        <div class="container space-top-3 space-top-lg-3 space-bottom-1 space-bottom-md-2 mt-7">
            <div class="row">
                <div id="stickyBlockStartPoint" class="col-md-5 col-lg-4 mb-7  mb-md-0">
                    <!-- Sidebar Content -->
                    <div class="js-sticky-block card bg-white"
                        data-hs-sticky-block-options='{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "parentSelector": "#stickyBlockStartPoint",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "startPoint": "#stickyBlockStartPoint",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "endPoint": "#stickyBlockEndPoint",
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "stickyOffsetTop": 15,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            "stickyOffsetBottom": 15
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }'>

                        <div class="card-header text-center py-5 ">
                            <div class="max-w-27rem mx-auto mb-3">
                                @if (!empty($profile->logo) && file_exists('storage/logo/' . $profile->logo))
                                    <img class="img-fluid rounded" src="{{ asset('storage/logo/' . $profile->logo) }}"
                                        alt="Logo" width="120" height="120">
                                @else
                                    <img class="img-fluid"
                                        src="https://ui-avatars.com/api/?name={{ $profile->first_name }}+{{ $profile->last_name }}"
                                        alt="Logo" width="120" height="120">
                                @endif
                                {{-- <img id="logo" class="avatar-img" src="" alt="Image Description" width="120"
                                    height="120"> --}}
                            </div>
                            <h4>{{ $profile->first_name . ' ' . $profile->last_name }}
                            </h4>
                            <span class="d-block text-muted font-size-1">
                                Jurusan
                                {{ $profile->seeker_education->category->name . ', ' . $profile->seeker_education->institute_name }}</span>
                            <span class="d-block text-body font-size-1 mt-1"><i
                                    class="fa-solid fa-location-dot mr-2"></i></i>
                                {{ $profile->address->city->name . ', ' . $profile->address->province->name }}</span>
                        </div>

                        <div class="card-body text-center">
                            <div class="border-bottom pb-2 mb-3">
                                <div class="row">
                                    <div class="col-6 col-md-12 col-lg-6 mb-0">
                                        <!-- Icon Block -->
                                        <div class="card bg-danger text-white text-center p-3 mb-0">
                                            {{ $application_count }}
                                        </div>
                                        Lamaran
                                        <!-- End Icon Block -->
                                    </div>
                                    <div class="col-6 col-md-12 col-lg-6 mb-4">
                                        <div class="card bg-info text-white text-center p-3 mb-0">
                                            {{ $application_accept_count }}
                                        </div>
                                        Diterima
                                    </div>
                                </div>
                            </div>
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
                                                    class="d-block font-size-1 font-weight-bold display-2">{{ $profile->telp }}</span>
                                            </div>
                                        </a>
                                        <!-- End Social Profiles -->
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12 mb-3">
                                        <!-- Social Profiles -->
                                        <a class="media" href="#">
                                            <div class="icon icon-xs icon-soft-secondary mr-3">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="media-body">
                                                <span
                                                    class="d-block font-size-1 font-weight-bold">{{ $account->email }}</span>
                                            </div>
                                        </a>
                                        <!-- End Social Profiles -->
                                    </div>
                                    @if (!empty($profile->website))
                                        <div class="col-12 col-md-12 col-lg-12 mb-0 mb-md-4 mb-lg-0">
                                            <!-- Social Profiles -->
                                            <a class="media" href="{{ $profile->website }}" target="_blank">
                                                <div class="icon icon-xs icon-soft-secondary mr-3">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span
                                                        class="d-block font-size-1 font-weight-bold">{{ $profile->website }}</span>
                                                </div>
                                            </a>
                                            <!-- End Social Profiles -->
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @auth
                                @if (Auth::user()->username == $account->username)
                                    <div class="mb-0">
                                        <a class="btn btn-xs btn-custom transition-3d-hover"
                                            href="{{ route('seeker.profile.edit', [$account->username, 'profile']) }}">
                                            <i class="fa-solid fa-user-pen  mr-2"></i>
                                            Edit Profil
                                        </a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <!-- End Sidebar Content -->
                </div>

                <div class="col-lg-8">
                    <div class="ml-lg-6">
                        <h3 class="mb-3">Tentang Saya</h3>
                        <p>{{ $profile->description }}</p>
                        <span class="d-block text-body font-size-1 mt-1"><i
                                class="fa-solid fa-hand-point-up  mr-2"></i>Bergabung sejak
                            {{ date('M', strtotime($profile->created_at)) . ' ' . date('Y', strtotime($profile->created_at)) }}</span>
                        <!-- Courses -->
                        <div class="border-top pt-5 mt-5">
                            <h3 class="mb-4">List Lamaran</h3>
                            <div class="row align-items-center mb-5 sorting">
                                <div class="col-lg-12 align-self-lg-end text-lg-right">
                                    <form>
                                        <div class="card p-3 mb-5">
                                            <div class="form-row input-group-borderless">
                                                <div class="col-sm column-divider-sm-left mb-2 mb-md-0">
                                                    <select class="form-control form-control-sm shadow-none" name="status"
                                                        id="status">
                                                        <option value="">Semua status</option>
                                                        <option
                                                            {{ request('status') && request('status') == 'Accepted' ? 'selected' : '' }}
                                                            value="Accepted">Accepted</option>
                                                        <option
                                                            {{ request('status') && request('status') == 'Rejected' ? 'selected' : '' }}
                                                            value="Rejected">Rejected</option>
                                                        <option
                                                            {{ request('status') && request('status') == 'Pending' ? 'selected' : '' }}
                                                            value="Pending">Pending</option>
                                                    </select>
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
                                                    <button type="submit"
                                                        class="btn btn-block btn-custom btn-sm btn-wide"><i
                                                            class="fa-solid fa-magnifying-glass mr-1"></i>Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Sorting -->
                            <!-- Vacancy -->
                            @if ($vacancy_applicants->count())
                                @foreach ($vacancy_applicants as $applicant)
                                    <div class="border-top pt-3 mt-3">
                                        <div class="card card-frame h-100">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-sm-3 col-lg-3 mb-3 mb-sm-0">
                                                        @if (!empty($applicant->vacancy->employers->logo) && file_exists('storage/logo/' . $applicant->vacancy->employers->logo))
                                                            <img class="mb-1 img-fluid rounded"
                                                                src="{{ asset('storage/logo/' . $applicant->vacancy->employers->logo) }}"
                                                                alt="Image Description">
                                                        @else
                                                            <img class="mb-1 img-fluid rounded"
                                                                src="https://ui-avatars.com/api/?name={{ $applicant->vacancy->employers->company_name }}"
                                                                alt="Image Description">
                                                        @endif

                                                        @auth
                                                            @if (Auth::user()->username == $account->username)
                                                                <h5 class="">
                                                                    Status :
                                                                    @if ($applicant->status == 'Pending')
                                                                        <span class="badge badge-warning">
                                                                            {{ $applicant->status }}</span>
                                                                    @elseif($applicant->status == 'Accepted')
                                                                        <span class="badge badge-success">
                                                                            {{ $applicant->status }}</span>
                                                                    @elseif($applicant->status == 'Rejected')
                                                                        <span class="badge badge-danger">
                                                                            {{ $applicant->status }}</span>
                                                                    @endif
                                                                </h5>
                                                            @endif
                                                        @endauth


                                                    </div>

                                                    <div class="col-sm-7 col-lg-9">
                                                        <div class="row">
                                                            <div class="col-lg-5 mb-2 mb-lg-0">
                                                                <a
                                                                    href="{{ route('vacancy.description', $applicant->vacancy->slug) }}">
                                                                    <h5 class="text-hover-custom">
                                                                        {{ $applicant->vacancy->job_title }}
                                                                    </h5>
                                                                </a>
                                                                <div class="d-flex align-items-center flex-wrap">
                                                                    <span class="d-inline-block">
                                                                        <span class="text-dark font-size-1 mr-1 mb-2">
                                                                            @foreach ($applicant->vacancy->categories as $category)
                                                                                <span class="badge badge-secondary">
                                                                                    {{ $category->name }}</span>
                                                                            @endforeach
                                                                        </span>
                                                                        <div class="small text-muted mt-2">
                                                                            <i class="fa-solid fa-briefcase mr-1"></i>
                                                                            {{ $applicant->vacancy->job_type }}
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <div class="small text-muted mb-2">
                                                                            <i class="fa-solid fa-map-pin mr-1"></i>
                                                                            {{ $applicant->vacancy->address->city->name }}
                                                                        </div>
                                                                        <div class="small text-muted mb-2">
                                                                            <i class="fa-solid fa-clock mr-1"></i>
                                                                            {{ $applicant->vacancy->created_at->diffForHumans() }}
                                                                        </div>
                                                                        <div class="small text-muted">
                                                                            <i class="fa-solid fa-lock mr-1"></i>
                                                                            {{ date('d', strtotime($applicant->vacancy->expiry_date)) .' ' .date('M', strtotime($applicant->vacancy->expiry_date)) .' ' .date('Y', strtotime($applicant->vacancy->expiry_date)) }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-1">
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        @auth
                                                                            @if (Auth::user()->username == $account->username)
                                                                                <button
                                                                                    onclick="destroy({{ $applicant->id }})"
                                                                                    type="button"
                                                                                    class="mt-1 btn btn-xs btn-danger btn-icon">
                                                                                    <i class="fa-solid fa-times"></i></button>
                                                                            @endif
                                                                        @endauth
                                                                        <a href="{{ route('vacancy.description', $applicant->vacancy->slug) }}"
                                                                            class="mt-1 btn btn-xs btn-custom btn-icon">
                                                                            <i class="fa-solid fa-circle-info"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Data lowongan tidak ditemukan!</p>
                            @endif
                        </div>
                        <!-- Pagination -->
                        <!-- End Pagination -->
                        <!-- Courses -->
                        <div class=" pt-5 mt-5">
                            <nav aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    {{ $vacancy_applicants->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Section -->
        <!-- Sticky Block End Point -->
        <div id="stickyBlockEndPoint"></div>
        <!-- CTA Section -->
        <div class="bg-info text-center bg-img-hero">
            <div class="container space-2">
                <div class="mb-5">
                    <h3 class="h2 text-white">Gabung menjadi Member Puskar Unmer!</h3>
                </div>
                <a href="/memberships" type=" button" class="btn btn-light transition-3d-hover">
                    Gabung Sekarang!
                    <i class="fa-solid fa-users-line ml-1"></i>
                </a>
            </div>
        </div>
        <!-- End CTA Section -->
    </main>
    <script src="{{ asset('app/seeker/profile.js') }}"></script>
@endsection
