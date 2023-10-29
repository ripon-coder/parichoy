<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar"> <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                @php
                    $pricinEdit        = strpos($_SERVER['REQUEST_URI'], '/admin/pricing-list/');
                    $subscribeEdit     = strpos($_SERVER['REQUEST_URI'], '/admin/subscribe-user/');
                    $heroSlideEdit     = strpos($_SERVER['REQUEST_URI'], '/admin/hero-slider/');
                    $postEdit          = strpos($_SERVER['REQUEST_URI'], '/admin/post/edit/');
                    $awardEdit          = strpos($_SERVER['REQUEST_URI'], '/admin/awards/edit/');
                    $legalsaid          = strpos($_SERVER['REQUEST_URI'], '/admin/legals-aid/edit/');
                    $membershipEdit    = strpos($_SERVER['REQUEST_URI'], '/admin/membership-renew/');
                    $generalMemberEdit = strpos($_SERVER['REQUEST_URI'], '/admin/general-member/');
                    $messageMemberEdit = strpos($_SERVER['REQUEST_URI'], '/admin/message-member/');
                    $missionEdit       = strpos($_SERVER['REQUEST_URI'], '/admin/missions/');
                    $atglanceEdit      = strpos($_SERVER['REQUEST_URI'], '/admin/at-glance/');
                    $reunionsEdit      = strpos($_SERVER['REQUEST_URI'], '/admin/reunions/');
                    $contributions     = strpos($_SERVER['REQUEST_URI'], '/admin/contributions/');
                    $membershiprenew   = strpos($_SERVER['REQUEST_URI'], '/admin/membership-renew/');
                    $publication       = strpos($_SERVER['REQUEST_URI'], '/admin/publication/');
                    $categoryEdit      = strpos($_SERVER['REQUEST_URI'], '/admin/post-category/');
                    $contributions  = strpos($_SERVER['REQUEST_URI'], '/admin/contributions/');
                    $electionCommission  = strpos($_SERVER['REQUEST_URI'], '/admin/election-commission/');

                    if( $generalMemberEdit){
                        $member = $generalMemberEdit;
                    }else{
                        $member = $messageMemberEdit;
                    }

                    if($missionEdit){
                        $homepageContent = $missionEdit;
                    }elseif ($atglanceEdit){
                        $homepageContent = $atglanceEdit;
                    }elseif ($reunionsEdit) {
                        $homepageContent = $reunionsEdit;
                    }else{
                        $homepageContent = $contributions;
                    }
                @endphp

                <li>
                    <a href="{{route('admin.dashboard')}}" class="{{ request()->is('admin') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>

                <li class="sm-link">
                    <a href="#" class="{{ $heroSlideEdit ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Hero Slide
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.hero-slider.create') }}" class="{{ request()->is('admin/hero-slider/create') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               Add Slide
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.hero-slider.index') }}" class="{{ request()->is('admin/hero-slider') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               Manage Slide
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="sm-link">
                    <a href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        About Info
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.about-us') }}" class="{{ request()->is('admin/about-us') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon fas fa-clipboard-list"></i>
                                Edit Contact Info
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about-us-page') }}" class="{{ request()->is('admin/about-us-page') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon fas fa-clipboard-list"></i>
                                About Us Page Content
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- <li>
                    <a href="{{ route('admin.all-images') }}" class="{{ request()->is('admin/all-images') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Gallery Image
                    </a>
                </li> --}}

                <li class="{{ $categoryEdit ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}" class="{{ request()->is('admin/categories') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        All Category
                    </a>
                </li>

                <li class="sm-link">
                    <a href="#" class="{{ $postEdit ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Posts
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>
                    <ul>

                        <li>
                            <a href="{{ route('admin.post.create') }}"  class="{{ request()->is('admin/post/create') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-mouse"></i>
                            Add New Post</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.post.all') }}" class="{{ request()->is('admin/posts') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                All Posts / News
                            </a>
                        </li>
                    </ul>
                </li>

               

                {{-- <li class="sm-link">
                    <a href="#" class="{{ $membershiprenew ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Membership Content
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.membership-renew.create') }}" class="{{ request()->is('admin/membership-renew/create') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                               Add Membership Content
                            </a>
                        </li>
                        
                    </ul>
                </li> --}}


                <li class="sm-link">
                    <a href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Photo & Video Gallery
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.photo-gallery')}}" class="{{ request()->is('admin/photo-gallery') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Photo Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.video-gallery')}}" class="{{ request()->is('admin/video-gallery') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Youtube Video Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.admin-facebook-video')}}" class="{{ request()->is('admin/admin-facebook-video') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Facebook Video
                            </a>
                        </li>
                    </ul>
                </li>



                {{-- <li class="sm-link">
                    <a class="{{ ($subscribeEdit) ? 'mm-active' : '' }}" href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Subscribe Users
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('admin.subscribe-user.index')}}" class="{{ request()->is('admin/subscribe-user') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                All Users
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.expired-user')}}" class="{{ request()->is('admin/expired-user') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Expired Users
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="{{ ($pricinEdit) ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.pricing-list.index') }}" class="{{ request()->is('admin/pricing-list') || $pricinEdit ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Subscription Packages
                    </a>
                </li> --}}

                <li class="sm-link">
                    <a href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Print and Media
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>

                    <ul>
                        <li>
                            <a href="{{route('admin.print-media-categories.index')}}" class="{{ request()->is('admin/print-media-categories') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Print Media Category
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/print-and-media-news') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.print-and-media-news') }}" class="{{ request()->is('print-and-media-news') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon fas fa-clipboard-list"></i>
                                Print & Media List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sm-link">
                    <a href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Print and Media
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>

                    <ul>
                        <li>
                            <a href="{{route('admin.print-media-categories.index')}}" class="{{ request()->is('admin/print-media-categories') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Print Media Category
                            </a>
                        </li>

                        <li class="{{ request()->is('/print-and-media-news') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.print-and-media-news') }}" class="{{ request()->is('print-and-media-news') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon fas fa-clipboard-list"></i>
                                Print & Media List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sm-link">
                    <a href="#">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Archive Print Version
                        <i class="metismenu-state-icon fas fa-chevron-down"></i>
                    </a>

                    <ul>
                        <li>
                            <a href="{{route('admin.archive-print-versions.index')}}" class="{{ request()->is('admin/archive-print-versions') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i>
                                Manage Print Version
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/archive-print-versions') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.archive-print-versions.create') }}" class="{{ request()->is('archive-print-versions') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon fas fa-clipboard-list"></i>
                                Add Print Version
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ request()->is('/comments') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.comments.index') }}" class="{{ request()->is('comments') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Comment List
                    </a>
                </li>

                <li class="{{ request()->is('/homepage-ad-view') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.homepage-ad-view') }}" class="{{ request()->is('homepage-ad-view') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        All AD For Homepage
                    </a>
                </li>

                <li class="{{ request()->is('/advertisement') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.advertisement.index') }}" class="{{ request()->is('advertisement') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        All Advertisement List
                    </a>
                </li>

                <li class="{{ request()->is('/delele-junks') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.delele-junks') }}" class="{{ request()->is('delele-junks') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon fas fa-clipboard-list"></i>
                        Delete Junks
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
