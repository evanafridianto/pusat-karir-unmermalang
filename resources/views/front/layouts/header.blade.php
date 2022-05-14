 <!-- ========== HEADER ========== -->
 {{-- <header id="header"
     class="header header-box-shadow-on-scroll header-white-bg-on-scroll header-sticky-top-lg header-bg-transparent-lg"
     data-hs-header-options='{
          "fixMoment": 1000,
          "fixEffect": "slide"
        }'> --}}
 <header id="header" class="header header-sticky-top" data-hs-header-options='{
          "fixMoment": 1000,
          "fixEffect": "slide"
        }'>
     <div class="header-section">
         <!-- Topbar -->
         <div class="container header-hide-content pt-2">
             <div class="d-flex align-items-center">
                 <span class="font-size-1 align-items-center" href="javascript: void(0);">
                     <i class="fa-solid fa-phone mr-1"></i> {{ $puskar->userable->telp }}
                     <i class="fa-solid fa-envelope ml-2 mr-1"></i>{{ $puskar->email }}
                 </span>
                 <div class="ml-auto">
                     <!-- Jump To -->
                     <div class="hs-unfold d-sm-none mr-2">
                         <a class="js-hs-unfold-invoker dropdown-nav-link d-flex align-items-center"
                             href="javascript: void(0);" data-hs-unfold-options='{
                             "target": "#jumpToDropdown",
                            "type": "css-animation",
                            "event": "hover",
                            "hideOnScroll": "true"
                            }'>
                             <i class="fa-solid fa-circle-user"></i>
                         </a>
                         <div id="jumpToDropdown" class="hs-unfold-content dropdown-menu">
                             @guest
                                 <a class="dropdown-item {{ \Request::is('register/seeker') ? 'active' : '' }}"
                                     href="{{ route('register', 'seeker') }}">Daftar</a>
                                 <a class="dropdown-item {{ \Request::route()->getName() == 'login' ? 'active' : '' }}"
                                     href="{{ route('login') }}">Masuk</a>
                             @endguest
                             @auth
                                 @if (Auth::user()->hasRole('employer'))
                                     <a class="dropdown-item  {{ \Request::route()->getName() == 'employer.profile' ? 'active' : '' }}"
                                         href="{{ route('employer.profile', Auth::user()->username) }}">Profil</a>
                                     <a class="dropdown-item  {{ \Request::is('*/account/edit') ? 'active' : '' }}"
                                         href="{{ route('employer.profile.edit', [Auth::user()->username, 'account']) }}">Edit
                                         Akun</a>
                                 @elseif(Auth::user()->hasRole('seeker'))
                                     <a class="dropdown-item  {{ \Request::route()->getName() == 'seeker.profile' ? 'active' : '' }}"
                                         href="{{ route('seeker.profile', Auth::user()->username) }}">Profil</a>
                                     <a class="dropdown-item  {{ \Request::is('*/account/edit') ? 'active' : '' }}"
                                         href="{{ route('seeker.profile.edit', [Auth::user()->username, 'account']) }}">Edit
                                         Akun</a>
                                 @endif
                                 <form method="POST" id="logout">
                                     @csrf

                                     <a class="dropdown-item" id="btn-logout" href="javascript: void(0);"
                                         onclick="logout()">Log
                                         Out</a>
                                 </form>
                             @endauth

                             {{-- <a class="dropdown-item {{ \Request::is('/membership') ? 'active' : '' }}"
                                 href="/membership">Membership</a> --}}
                             <div class="hs-unfold dropdown-item">
                                 <a class="js-hs-unfold-invoker dropdown-nav-link dropdown-toggle" href="javascript:;"
                                     data-hs-unfold-options='{
                                               "target": "#basicDropdownHover1",
                                               "type": "css-animation",
                                               "event": "hover"
                                             }'>Membership</a>

                                 <div id="basicDropdownHover1" class="hs-unfold-content dropdown-menu">
                                     <a class="dropdown-item {{ \Request::is('/membership') ? 'active' : '' }}"
                                         href="/membership">Gabung</a>

                                     @auth
                                         @if (Auth::user()->hasRole('employer') || Auth::user()->hasRole('seeker'))
                                             <a class="dropdown-item"
                                                 href="{{ route('pay.confirmation', Auth::user()->username) }}">Konfirmasi</a>
                                         @endif
                                     @endauth

                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- End Jump To -->


                     <!-- Links -->
                     <div class="nav nav-sm nav-y-0 d-none d-sm-flex ml-sm-auto">
                         <div class="hs-unfold mr-2">
                             <a class="js-hs-unfold-invoker dropdown-nav-link dropdown-toggle" href="javascript:;"
                                 data-hs-unfold-options='{
                                                                                               "target": "#basicDropdownHover2",
                                                                                               "type": "css-animation",
                                                                                               "event": "hover"
                                                                                             }'><i
                                     class="fa-solid fa-medal mr-1"></i>Membership</a>

                             <div id="basicDropdownHover2" class="hs-unfold-content dropdown-menu">
                                 <a class="dropdown-item {{ \Request::is('/membership') ? 'active' : '' }}"
                                     href="/membership">Gabung</a>
                                 @auth
                                     @if (Auth::user()->hasRole('employer') || Auth::user()->hasRole('seeker'))
                                         <a class="dropdown-item"
                                             href="{{ route('pay.confirmation', Auth::user()->username) }}">Konfirmasi</a>
                                     @endif
                                 @endauth
                             </div>
                         </div>
                         @auth
                             @if (Auth::user()->hasRole('employer') || Auth::user()->hasRole('seeker'))
                                 <!-- Unfold (Dropdown) -->
                                 <div class="hs-unfold">
                                     <a class="js-hs-unfold-invoker dropdown-nav-link" href="javascript: void(0);"
                                         data-hs-unfold-options='{
                                                                                                                                                                                                                                                                                                                                                                                                            "target": "#basicDropdownHover",
                                                                                                                                                                                                                                                                                                                                                                                                            "type": "css-animation",
                                                                                                                                                                                                                                                                                                                                                                                                            "event": "hover"
                                                                                                                                                                                                                                                                                                                                                                                                            }'>{{ Auth::user()->username }}<i
                                             class="fa-solid fa-circle-user ml-1"></i></a>
                                     <div id="basicDropdownHover" class="hs-unfold-content dropdown-menu">
                                         @if (Auth::user()->hasRole('employer'))
                                             <a class="dropdown-item  {{ \Request::route()->getName() == 'employer.profile' ? 'active' : '' }}"
                                                 href="{{ route('employer.profile', Auth::user()->username) }}">Profil</a>
                                             <a class="dropdown-item  {{ \Request::is('*/account/edit') ? 'active' : '' }}"
                                                 href="{{ route('employer.profile.edit', [Auth::user()->username, 'account']) }}">Edit
                                                 Akun</a>
                                         @elseif(Auth::user()->hasRole('seeker'))
                                             <a class="dropdown-item  {{ \Request::route()->getName() == 'seeker.profile' ? 'active' : '' }}"
                                                 href="{{ route('seeker.profile', Auth::user()->username) }}">Profil</a>
                                             <a class="dropdown-item  {{ \Request::is('*/account/edit') ? 'active' : '' }}"
                                                 href="{{ route('seeker.profile.edit', [Auth::user()->username, 'account']) }}">Edit
                                                 Akun</a>
                                         @endif
                                         <form method="POST" id="logout">
                                             @csrf

                                             <a class="dropdown-item" id="btn-logout" href="javascript: void(0);"
                                                 onclick="logout()">Log
                                                 Out</a>
                                         </form>
                                     </div>
                                 </div>
                                 <!-- End Unfold (Dropdown) -->
                             @endif
                         @endauth
                         @guest

                             <a class="nav-link {{ \Request::route()->getName() == 'login' ? 'active' : '' }}"
                                 href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket mr-1"></i>
                                 Masuk
                             </a>
                             <a class="nav-link {{ \Request::route()->getName() == 'register' ? 'active' : '' }}"
                                 href="{{ route('register', 'seeker') }}"><i
                                     class="fa-solid fa-user-plus mr-1"></i>Daftar</a>
                         @endguest

                     </div>
                     <!-- End Links -->
                 </div>
             </div>
         </div>
         <!-- End Topbar -->

         <div id="logoAndNav" class="container">
             <!-- Nav -->
             <nav class="js-mega-menu navbar navbar-expand-lg">
                 <!-- Logo -->
                 <a class="navbar-brand" href="{{ route('home') }}">
                     <img src="{{ asset('user/assets/img/logos/pusat-karir.svg') }}" alt="Logo">
                 </a>
                 <!-- End Logo -->

                 <!-- Responsive Toggle Button -->
                 <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle"
                     aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse"
                     data-target="#navBar">
                     <span class="navbar-toggler-default">
                         <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                             <path fill="currentColor"
                                 d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z" />
                         </svg>
                     </span>
                     <span class="navbar-toggler-toggled">
                         <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                             <path fill="currentColor"
                                 d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z" />
                         </svg>
                     </span>
                 </button>
                 <!-- End Responsive Toggle Button -->

                 <!-- Navigation -->
                 <div id="navBar" class="collapse navbar-collapse">
                     <div class="navbar-body header-abs-top-inner">
                         <ul class="navbar-nav">
                             <!-- Pages -->
                             <li class="navbar-nav-item {{ \Request::is('/') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                             </li>
                             <li class="navbar-nav-item {{ \Request::is('vacancy') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('vacancy') }}">Lowongan Karir</a>
                             </li>
                             <li class="navbar-nav-item {{ \Request::is('article') ? 'active' : '' }}">
                                 <a class="nav-link" href="{{ route('article') }}">Berita & Event</a>
                             </li>

                             <li class="navbar-nav-item">
                                 <a class="nav-link" target="_BLANK" href="https://tracer.unmer.ac.id/">Tracer
                                     Study<i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
                                 </a>
                             </li>

                             <li class="navbar-nav-item {{ \Request::is('about') ? 'active' : '' }}">
                                 <a class="nav-link" href="/about">Tentang</a>
                             </li>

                             @if ($pages->count())
                                 <!-- Pages -->
                                 <li class="hs-has-sub-menu header-nav-item" data-hs-mega-menu-item-options='{
                                    "desktop": {
                                    "position": "left"
                                    }
                                }'>
                                     <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link"
                                         href="javascript: void(0);" aria-haspopup="true" aria-expanded="false"
                                         aria-labelledby="pagesSubMenu">
                                         <i class="fa-solid fa-bars mr-1 font-size-2"></i>
                                     </a>
                                     <div id="pagesSubMenu" class="hs-sub-menu dropdown-menu"
                                         aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                         @foreach ($pages as $key => $page)
                                             <a class="dropdown-item"
                                                 href="{{ route($page->slug) }}">{{ $page->name }}</a>
                                         @endforeach
                                     </div>
                                 </li>
                                 <!-- End Pages -->
                             @endif

                             @auth
                                 @if (Auth::user()->hasRole('employer'))
                                     <!-- Button -->
                                     <li class="navbar-nav-last-item">
                                         <a class="btn btn-sm {{ Auth::user()->userable->status == 'Verified' ? 'btn-custom' : 'btn-navy' }} transition-3d-hover"
                                             href="{{ route('employer.vacancy.create', Auth::user()->username) }}">
                                             <i class="fa-solid fa-plus mr-1"></i>
                                             Posting Job
                                         </a>
                                     </li>
                                     <!-- End Button -->
                                 @endif
                             @endauth
                             @guest
                                 <!-- Button -->
                                 <li class="navbar-nav-last-item">
                                     <a class="btn btn-sm btn-custom  transition-3d-hover"
                                         href="{{ route('register', 'employer') }}">
                                         Perusahaan
                                     </a>
                                 </li>
                                 <!-- End Button -->
                             @endguest
                         </ul>
                     </div>
                 </div>
                 <!-- End Navigation -->
             </nav>
             <!-- End Nav -->
         </div>
     </div>
 </header>
 <!-- ========== END HEADER ========== -->
