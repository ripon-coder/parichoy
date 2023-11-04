<section class="header_times">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="bangla_date text-center-mobile">
                    @php
                        $currentDate = date("l d F Y");
                        $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
                        'May','June','July','August','September','October','November','December','Saturday','Sunday',
                        'Monday','Tuesday','Wednesday','Thursday','Friday');
                        $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
                        'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
                        বুধবার','বৃহস্পতিবার','শুক্রবার' 
                        );
                        $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
                        echo "$convertedDATE";
                    @endphp 
                    খ্রিস্টাব্দ
                </div>
            </div>
            <div class="col-sm-4">
                <div class="bangla_date" style="text-align: center">
                    নিউইয়র্ক থেকে প্রকাশিত
                </div>
            </div>
            <div class="col-sm-4">
                <div class="top_banner_menu_link">
                    <ul>
                        <li><a href="javascript:;">আমাদের সম্পর্কে</a></li>
                        <li><a href="javascript:;">যোগাযোগ</a></li>
                        <li>
                            <a href="#googtrans(bn)" class="single-language lang-es lang-select" data-lang="bn"> বাংলা</a>

                            <a href="#googtrans(en)" class="single-language lang-en lang-select" data-lang="en">English</a>
                        </li>
                    </ul>
                </div>
            </div>

            
        </div>
    </div>
</section>

<header class="header-main">
    <div class="header-inner-wrapper">
        <!-- Navbar Main Section -->
        <nav class="navbar-main">
            <div class="top-header">
                <div class="logo-section">
                    <a class="brand-logo" href="{{ url('/') }}">
                        <img class="laptop" src="{{ asset( $g_about_us->header_logo ) }}" alt="Parichoy Logo"/>
                        <img class="mobile-tab" src="{{ asset( $g_about_us->header_logo ) }}" alt="Parichoy Logo"/>
                    </a>

                    <div class="nav-item-main sm-sc">
                        <div class="header-search-container">
                            <div class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="header-search-form-wrapper collapse">
                                <form class="header-search-form-main" method="get" action="">
                                    <div class="input-wrapper">
                                        <input type="search" class="search-field" placeholder="খুজুন..." value="" name="s" autocomplete="off">
                                        <button type="submit" class="h-search-submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button class="navbar-menu-toggle-btn">
                        <span class="toggler-icon-bar"></span>
                    </button>
                </div>
            </div>

            <div class="nav-items-wrapper">
                <ul class="nav-item-inner-wrapper">
                    <li class="nav-item-main">
                        <a class="nav-item-link" href="{{ url('/') }}">{{ __('হোম') }}</a>
                    </li>
                    
                    @if (count($menuCategories) > 0)  
                        @foreach ($menuCategories as $menuCategory)
                            <li class="nav-item-main {{ count($menuCategory->subCategories) > 0 ? 'item-has-submenu' : '' }} ">
                                <a class="nav-item-link" href="{{ route('category.product.view', $menuCategory->slug) }}">{{ $menuCategory->title }}</a>
                                @if($loop->iteration == 9)
                                <li class="nav-item-main">
                                    <a class="nav-item-link" href="{{route('video')}}">ভিডিও</a>
                                </li>
                                @endif
                                <ul class="nav-item-submenu">
                                    @foreach ($menuCategory->subCategories as $subCategory)
                                        <li class="nav-item-submenu-item">
                                            <a class="nav-item-submenu-item-link" href="{{ route('category.product.view', $subCategory->slug) }}">
                                                {{ $subCategory->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                         @endforeach  
                    @endif


                    
                    {{-- <li class="nav-item-main item-has-submenu">
                        <a class="nav-item-link" href="">অন্যান্য</a>
                        <ul class="nav-item-submenu">
                            <li class="nav-item-submenu-item">
                                <a class="nav-item-submenu-item-link" href="category-post.php">শিক্ষা</a>
                            </li>
                        </ul>
                    </li> --}}
                    
                

                    <li class="nav-item-main lg-sc">
                        <div class="header-search-container">
                            <div class="header-search-btn">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="header-search-form-wrapper collapse">
                                {{-- <form class="header-search-form-main" method="get" action=""> --}}

                                <form class="header-search-form-main" action="{{ route('search') }}" method="POST">
                                    @csrf

                                    <div class="input-wrapper">
                                        <input type="search" class="search-field" placeholder="খুজুন..." value="" name="search" autocomplete="off">
                                        <button type="submit" class="h-search-submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>