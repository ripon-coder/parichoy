<div class="fs-f-bar-inner">
   <div class="wrapper search-wrapper">
        <div class="heading common">
        </div>

       <div class=" widget-search">
            <form class="search-form" action="{{ route('search') }}" method="POST">
                @csrf
                <label>
                    <input type="search" class="search-field" placeholder="খুজুন..." value="" name="search" />
                </label>
                <button type="submit" class="search-submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>

   </div>

   <div class="wrapper short-breif mt-4">
       <div class="heading common">
            <h2 class="title" >{{ __('সর্বশেষ খবর') }}</h2>
        </div>
        <ul class="latest-news-brief">
            @if (count($recentPosts) > 0)
                @foreach ($recentPosts as $post)
                    <li>
                        <a href="{{ route('single-post', $post->slug) }}"> {{ $post->title }} </a>
                    </li>
                @endforeach
            @endif
        </ul>
   </div>

   <div class="wrapper short-breif mt-4">
       <div class="heading common">
            <h2 class="title" >সাম্প্রতিক মন্তব্য</h2>
        </div>
        <ul class="latest-news-brief">
            @if (count( $comments ) > 0 )
                @foreach ($comments as $comment)
                    <li>
                        {{ Str::limit( strip_tags($comment->comment), 60 ) }}
                    </li>
                @endforeach
            @endif
            
        </ul>
   </div>

   <div class="wrapper short-breif mt-4">
       <div class="heading common">
            <h2 class="title" >{{ __('ক্যাটাগরি') }}</h2>
        </div>
        <ul class="latest-news-brief sidebar-category">
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <li class="mb-2">
                        <a href="{{ route('category.product.view', $category->slug) }}">{{ $category->title }} ( {{ $category->posts_count }} )</a>
                    </li>
                @endforeach
            @endif
        </ul>
   </div>

   <div class="wrapper mt-4">
       <div class="heading common">
            <h2 class="title" >{{ __('আর্কাইভ') }} </h2>
        </div>
        
        <ul class="latest-news-brief sidebar-category">
            
            @foreach ( $archives as $state )
                <li class="mb-2">
                    <a href="{{ url('/archive/') }}?month={{ $state->monthname }}&year={{ $state->year }}">{{ $state->monthname }} {{ $state->year }}</a>
                </li>
            @endforeach            
        </ul>
   </div>

   {{-- <div class="wrapper mt-4">
       <div class="heading common">
            <h2 class="title" >ক্যালেনডার আর্কাইভ</h2>
        </div>
        Calendar plugin here
   </div> --}}
</div> 