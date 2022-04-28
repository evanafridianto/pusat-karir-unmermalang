<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
        </div><!-- input-group -->
    </div><!-- br-header-left -->
    <div class="br-header-right">
        <nav class="nav">
            {{-- <div class="dropdown">
                <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-ios-bell-outline tx-24"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                    <!-- end: if statement -->
                </a>
               <div class="dropdown-menu dropdown-menu-header">
                    <div class="dropdown-menu-label">
                        <label>Notifications</label>
                        <a href="">Mark All as Read</a>
                    </div><!-- d-flex -->

                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link read">
                            <div class="media">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="media-body">
                                    <p class="noti-text"><strong>Suzzeth Bungaos</strong> tagged you and 18
                                        others in a post.</p>
                                    <span>October 03, 2017 8:45am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link read">
                            <div class="media">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="media-body">
                                    <p class="noti-text"><strong>Mellisa Brown</strong> appreciated your work
                                        <strong>The Social Network</strong>
                                    </p>
                                    <span>October 02, 2017 12:44am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="media-body">
                                    <p class="noti-text">20+ new items added are for sale in your <strong>Sale
                                            Group</strong></p>
                                    <span>October 01, 2017 10:20pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media">
                                <img src="https://via.placeholder.com/500" alt="">
                                <div class="media-body">
                                    <p class="noti-text"><strong>Julius Erving</strong> wants to connect with
                                        you on your conversation with <strong>Ronnie Mara</strong></p>
                                    <span>October 01, 2017 6:08pm</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <div class="dropdown-footer">
                            <a href=""><i class="fa fa-angle-down"></i> Show All Notifications</a>
                        </div>
                    </div><!-- media-list -->
                </div><!-- dropdown-menu -->
            </div><!-- dropdown --> --}}
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    {{-- <span
                        class="logged-name hidden-md-down">{{ !empty(Auth::user()->name) ? Auth::user()->email : '' }}</span> --}}
                    <span class="logged-name hidden-md-down">{{ 'Hi, ' . Auth::user()->username }}</span>
                    @if (!empty(Auth::user()->userable->logo) && file_exists('storage/logo/' . Auth::user()->userable->logo))
                        <img src="{{ asset('storage/logo/' . Auth::user()->userable->logo) }}"
                            class="wd-32 rounded-circle" alt="">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->userable->company_name }}"
                            class="wd-32 rounded-circle" alt="">
                    @endif
                    <span class="square-10 bg-success"></span>
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-250">
                    <div class="tx-center">
                        <a href="">

                            @if (!empty(Auth::user()->userable->logo) && file_exists('storage/logo/' . Auth::user()->userable->logo))
                                <img src="{{ asset('storage/logo/' . Auth::user()->userable->logo) }}"
                                    class="wd-80 rounded-circle" alt="">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->userable->company_name }}"
                                    class="wd-80 rounded-circle" alt="">
                            @endif

                        </a>
                        <h6 class="logged-fullname">
                            {{ Auth::user()->userable->company_name }}
                        </h6>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <hr>
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="{{ route('admin.profile.edit') }}"><i class="icon ion-ios-person"></i>
                                Profile</a></li>
                        <li><a href="javascript: void(0);" onclick="account('{{ Auth::user()->username }}')"><i
                                    class="icon ion-ios-locked"></i> Akun</a></li>
                        <li>
                            <form method="POST" id="logout">
                                @csrf
                                <a href="javascript: void(0);" onclick="logout()"><i class="icon ion-power"></i> Log
                            </form>
                            Out</a>
                        </li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
    </div><!-- br-header-right -->
</div><!-- br-header -->
