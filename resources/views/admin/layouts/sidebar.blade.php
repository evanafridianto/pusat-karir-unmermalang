     <!-- ########## START: LEFT PANEL ########## -->
     <a href="{{ route('admin.dashboard') }}">
         <div class="br-logo"><img src="{{ asset('user/assets/img/logos/pusat-karir.svg') }}" width="120"
                 alt="Logo"></div>
     </a>
     <div class="br-sideleft sideleft-scrollbar">
         <label class="sidebar-label pd-x-10 mg-t-20 op-3">Menu Navigasi</label>
         <ul class="br-sideleft-menu">
             <li class="br-menu-item">
                 <a href="{{ route('admin.dashboard') }}"
                     class="br-menu-link {{ \Request::is('admin/dashboard') ? 'active' : '' }}">
                     <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                     <span class="menu-item-label">Dashboard</span>
                 </a><!-- br-menu-link -->
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <a href="{{ route('home') }}" target="_blank" class="br-menu-link">
                     <i class="menu-item-icon icon ion-ios-redo-outline tx-22"></i>
                     <span class="menu-item-label">Kunjungi Website</span>
                 </a><!-- br-menu-link -->
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <a href="#"
                     class="br-menu-link with-sub {{ \Request::is('admin/applicant') || \Request::is('admin/vacancy') || \Request::is('admin/seeker') || \Request::is('admin/employer') || \Request::is('admin/membership') ? 'active' : '' }}">
                     <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                     <span class="menu-item-label">Karir</span>
                 </a><!-- br-menu-link -->
                 <ul class="br-menu-sub">
                     <li class="sub-item"><a href="{{ route('admin.vacancy') }}"
                             class="sub-link {{ \Request::is('admin/vacancy') ? 'active' : '' }}">Lowongan</a>
                     </li>
                     <li class="sub-item"><a href="{{ route('admin.applicant') }}"
                             class="sub-link {{ \Request::is('admin/applicant') ? 'active' : '' }}">Pelamar</a>
                     </li>
                     <li class="sub-item"><a href="{{ route('admin.employer') }}"
                             class="sub-link {{ \Request::is('admin/employer') ? 'active' : '' }}">Perusahaan</a>
                     </li>
                     <li class="sub-item"><a href="{{ route('admin.seeker') }}"
                             class="sub-link {{ \Request::is('admin/seeker') ? 'active' : '' }}">Percari Kerja</a>
                     </li>
                     <li class="sub-item"><a href="{{ route('admin.membership') }}"
                             class="sub-link {{ \Request::is('admin/membership') ? 'active' : '' }}">Membership</a>
                     </li>
                 </ul>
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <a href="#"
                     class="br-menu-link with-sub {{ \Request::is('admin/article') || \Request::is('admin/page') ? 'active' : '' }}">
                     <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                     <span class="menu-item-label">Postingan</span>
                 </a><!-- br-menu-link -->
                 <ul class="br-menu-sub">
                     <li class="sub-item"><a href="{{ route('admin.article') }}"
                             class="sub-link {{ \Request::is('admin/article') ? 'active' : '' }}">Artikel</a>
                     </li>
                     <li class="sub-item"><a href="{{ route('admin.page') }}"
                             class="sub-link {{ \Request::is('admin/page') ? 'active' : '' }}">Halaman</a>
                     </li>
                 </ul>
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <a href="{{ route('admin.category') }}"
                     class="br-menu-link {{ \Request::is('admin/category') ? 'active' : '' }}">
                     <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
                     <span class="menu-item-label">Kategori</span>
                 </a><!-- br-menu-link -->
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <a href="#"
                     class="br-menu-link with-sub {{ \Request::is('admin/province') || \Request::is('admin/city') ? 'active' : '' }}">
                     <i class="menu-item-icon icon ion-ios-world-outline tx-22"></i>
                     <span class="menu-item-label">Wilayah</span>
                 </a><!-- br-menu-link -->
                 <ul class="br-menu-sub">
                     <li class="sub-item"><a href="{{ route('admin.province') }}"
                             class="sub-link {{ \Request::is('admin/province') ? 'active' : '' }}">Provinsi</a>
                     </li>
                     <li class="sub-item"><a href="{{ route('admin.city') }}"
                             class="sub-link {{ \Request::is('admin/city') ? 'active' : '' }}">Kota/Kabupaten</a>
                     </li>
                 </ul>
             </li><!-- br-menu-item -->

             <label class="sidebar-label pd-x-10 mg-t-20 op-3">Akun</label>

             <li class="br-menu-item">
                 <a href="{{ route('admin.profile.edit') }}"
                     class="br-menu-link {{ \Request::is('admin/profile/edit') ? 'active' : '' }}">
                     <i class="menu-item-icon icon ion-ios-person-outline tx-22"></i>
                     <span class="menu-item-label">Profil</span>
                 </a><!-- br-menu-link -->
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <form>
                     @csrf
                     {{-- ion-ios-locked-outline --}}
                     <a href="javascript: void(0);" onclick="account('{{ Auth::user()->username }}')"
                         class="br-menu-link">
                         <i class="menu-item-icon icon ion-ios-locked-outline tx-22"></i>
                         <span class="menu-item-label"> Akun</span>
                     </a><!-- br-menu-link -->
                 </form>
             </li><!-- br-menu-item -->
             <li class="br-menu-item">
                 <form id="logout">
                     @csrf
                     <a href="javascript: void(0);" onclick="logout()" class="br-menu-link">
                         <i class="menu-item-icon icon ion-log-out tx-22"></i>
                         <span class="menu-item-label">Log Out</span>
                     </a><!-- br-menu-link -->
                 </form>
             </li><!-- br-menu-item -->
         </ul><!-- br-sideleft-menu -->
     </div><!-- br-sideleft -->
     <!-- ########## END: LEFT PANEL ########## -->

     <!-- ########## START: RIGHT PANEL ########## -->
     <div class="br-sideright">
         <!-- Tab panes -->
         <div class="tab-content">
             <div class="tab-pane pos-absolute a-0 mg-t-60 contact-scrollbar active" role="tabpanel">
             </div><!-- #contacts -->
             <div class="tab-pane pos-absolute a-0 mg-t-60 attachment-scrollbar" role="tabpanel">
             </div><!-- #history -->
             <div class="tab-pane pos-absolute a-0 mg-t-60 schedule-scrollbar" role="tabpanel">
             </div>
             <div class="tab-pane pos-absolute a-0 mg-t-60 settings-scrollbar" role="tabpanel">
             </div>
         </div><!-- tab-content -->
     </div><!-- br-sideright -->
     <!-- ########## END: RIGHT PANEL ########## --->
