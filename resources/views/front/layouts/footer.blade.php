{{-- <footer class="bg-custom-light"> --}}
<footer class="bg-soft-warning">
    <!-- Lists -->
    <div class="container">
        <div class="border-top space-2">
            <div class="row justify-content-md-between">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <a class="d-inline-flex mb-4" href="{{ route('home') }}" aria-label="Front">
                        <img class="brand" src="{{ asset('user/assets/img/logos/pusat-karir.svg') }}"
                            alt="Logo">
                    </a>
                    <p> Copyright &copy; {{ date('Y') . '. ' . config('app.name') }}. All Right Reserved.</p>

                    <!-- Nav Link -->
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item">
                            <span class="media">
                                <span class="fa fa-location-arrow mt-1 mr-1"></span>
                                <span class="media-body">
                                    Jalan Terusan Dieng No. 62-64 Klojen, Pisang Candi, Kec. Sukun, Kota Malang,
                                    Jawa Timur 65146
                                </span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <span class="media">
                                <span class="fa-solid fa-phone mt-1 mr-2"></span>
                                <span class="media-body">
                                    +1 (062) 109-9222
                                </span>
                            </span>
                        </li>
                    </ul>
                    <!-- End Nav Link -->
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <h5>Halaman</h5>
                    <!-- Nav Link -->
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('vacancy') }}">Lowongan
                                Karir</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('article') }}">Berita &
                                Event</a>
                        </li>
                        <li class="nav-item">
                            @foreach ($pages as $key => $page)
                                <a class="nav-link" href="{{ route($page->slug) }}">{{ $page->name }}</a>
                            @endforeach
                        </li>
                    </ul>
                    <!-- End Nav Link -->
                </div>

                <div class="col-6 col-sm-4 col-lg-2">
                    <h5>Tautan
                        <i class="fa-solid fa-arrow-up-right-from-square ml-2">
                        </i>
                    </h5>
                    <!-- Nav Link -->
                    <ul class="nav nav-sm nav-x-0 flex-column">
                        <li class="nav-item"><a class="nav-link" target="_blank"
                                href="https://unmer.ac.id/">Universitas
                                Merdeka Malang</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" target="_blank"
                                href="https://tracer.unmer.ac.id/">Tracer
                                Study</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" target="_blank"
                                href="https://lppm.unmer.ac.id/">LPPM</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" target="_blank"
                                href="https://library.unmer.ac.id/index.php">Perpustakaan</a>
                        </li>
                    </ul>
                    <!-- End Nav Link -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Lists -->
</footer>
