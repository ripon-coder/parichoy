@extends('layouts.website')
@section('content')

    <div class="single-post">
        <section class="all-events-section category-blog">
            <div class="container pt-5 fs-wrapper">
                <div class="row">
                    <div class="col-lg-8 fs-f-content">
                        <div class="fs-f-content-inner">
                            <div class="single-post-inner">
                                {{-- <div class="image">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                </div> --}}
                                <div class="midddle-content">
                                    {{-- <div class="mt-4 mb-2">
                                        @if (count($post->categories))
                                            @foreach ($post->categories as $category)
                                                <a class="custom-badge" href="{{ route('category.product.view', $category->slug) }}"> {{ $category->title }} </a>
                                            @endforeach
                                        @endif
                                    </div> --}}

                                    <h2 class="post-main-title">{{ $post->title }}</h2>
                                    <div class="meta d-flex mt-2">
                                        {{-- <h3 class="date-time">
                                            <span><i class="far fa-user"></i></span> 
                                            by Admin
                                        </h3> --}}
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> 
                                            {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <h3 class="date-time ml-3">
                                            <span><i class="far fa-eye"></i></span> 
                                            150
                                        </h3>
                                    </div>
                                </div>

                                <div class="image mt-3">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                </div>
                                
                                <div class="description">
                                    <p>
                                        {!! $post->description !!}
                                    </p>

                                    <p>
                                        <a href="">
                                            <img alt="" src="assets/images/img_1608987356_5fe732dc74ae3.JPG" width="100px" />
                                        </a>
                                    </p>

                                    {{-- <p>&nbsp;</p>

                                    <h3>Order List</h3>

                                    <ol>
                                        <li>List Item</li>
                                        <li>List Item</li>
                                    </ol>

                                    <h3>Unorder List</h3>

                                    <ul>
                                        <li>gbdfgfdgdf</li>
                                        <li>dfgsdfgdfgfd</li>
                                    </ul>

                                    <h2><strong>E</strong></h2>

                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>E.Coli</td>
                                                <td>Ear Discharge</td>
                                                <td>Ear Infections</td>
                                            </tr>
                                            <tr>
                                                <td>Ear Pain</td>
                                                <td>Eczema</td>
                                                <td>Elbow Pain</td>
                                            </tr>
                                            <tr>
                                                <td>Emphysema</td>
                                                <td>Endometriosis</td>
                                                <td>Enlarged Prostate</td>
                                            </tr>
                                            <tr>
                                                <td>Epididymitis</td>
                                                <td>Epilepsy</td>
                                                <td>Epistaxis</td>
                                            </tr>
                                            <tr>
                                                <td>Erectile Dysfunction</td>
                                                <td>Esophageal Varices</td>
                                                <td>Eustachian Tube Blockage</td>
                                            </tr>
                                            <tr>
                                                <td>Excessive Sweating</td>
                                                <td>Eye Floaters</td>
                                                <td>Eyes DRY</td>
                                            </tr>
                                            <tr>
                                                <td>Eyes Itchy</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table> --}}

                                    <div class="addThis">
                                        <strong>সোস্যাল শেয়ার :</strong>
                                        <div class="addthis_inline_share_toolbox_334g"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                                <div class="penci-post-pagination">
                                    @if ($prev_post)
                                        <div class="prev-post">
                                            <div class="penci_media_object">
                                                <a class="post-nav-thumb penci_mobj__img" href="">
                                                    <img width="150" height="150" src="{{ asset($prev_post->image) }}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $prev_post->title }}"/>
                                                </a>
                                                <div class="prev-post-inner penci_mobj__body">
                                                    <div class="prev-post-title">
                                                        <span><i class="fa fa-angle-left"></i>previous post</span>
                                                    </div>
                                                    <div class="pagi-text">
                                                        <h5 class="prev-title"><a href="{{ route('single-post', $prev_post->slug) }}">{{ $prev_post->title }}</a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($next_post)
                                        <div class="next-post">
                                            <div class="penci_media_object penci_mobj-image-right">
                                                <a class="post-nav-thumb penci_mobj__img"
                                                    href="">
                                                    <img width="150" height="150" src="{{ asset($next_post->image) }}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $next_post->title }}" />
                                                </a>
                                                <div class="next-post-inner">
                                                    <div class="prev-post-title next-post-title">
                                                        <span>next post<i class="fa fa-angle-right"></i></span>
                                                    </div>
                                                    <div class="pagi-text">
                                                        <h5 class="next-title">
                                                            <a href="{{ route('single-post', $next_post->slug) }}">
                                                                {{ $next_post->title }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            

                            <!-- News Slider start -->
                            <div class="home-news-section pb-0 mt-5">
                                <div class="left-box-news-inner">
                                    <div class="latest-update-news-item-wrapper">
                                        <div class="single-blog-related-post owl-carousel">

                                            @if (count($relatedPosts) > 0)
                                                @foreach ($relatedPosts as $relatedPost)
                                                    <div class="latest-update-news-item-outer ns-a">
                                                        <a class="latest-update-news-item" href="">
                                                            <div class="image not-cat">
                                                                <img src="{{ asset($relatedPost->image) }}" alt="{{ $relatedPost->title }}"/>
                                                            </div>
                                                            <div class="content not-cat">
                                                                <h2 class="title">{{ $relatedPost->title }}</h2>
                                                                <div class="meta d-flex">
                                                                    <h3 class="date">
                                                                        <span><i class="far fa-clock"></i></span> {{ date('M d, Y', strtotime($relatedPost->created_at)) }}
                                                                    </h3>
                                                                    <h3 class="date ml-3">
                                                                        <span><i class="far fa-eye"></i></span> 150
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- News Slider end -->

                            <!-- Comment Section -->
                            <div class="post-comment-section pt-5">
                                <h6 class="mb-4"><b>মন্তব্য করুন</b></h6>
                            </div>

                            <form method="POST" action="{{ route('comment-store.store') }}">
                                @csrf
                                <input type="hidden" value="{{ $post->id }}" name="post_id">
                                <div class="input-row row mb-3">
                                    <div class="col-lg-12">
                                        <textarea class=" form-control @error('comment') is-invalid @enderror" name="comment" cols="45" rows="8" placeholder="আপনার মন্তব্য" aria-required="true" value="{{ old('comment') }}"></textarea>

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-row row">
                                    <div class="col-lg-4 pr-1">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="নাম*" value="{{ old('name') }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 pr-1 pl-1">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="ইমেইল*" value="{{ old('email') }}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 pl-1">
                                        <input class="form-control @error('website') is-invalid @enderror" type="url" name="website" placeholder="ওয়েব সাইট" value="{{ old('website') }}">

                                        @error('website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                </div>

                                {{-- <div class="input-row row align-items-center col-lg-12 mt-2">
                                    <input class="mb-0 mr-2 @error('checkmark') is-invalid @enderror" type="checkbox" name="checkmark" value="1" {{ old('checkmark') ? 'checked' : '' }}>
                                    Save my name, email, and website in this browser for the next time I comment.

                                    @error('checkmark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="row col-lg-12 mt-3">
                                    <input class="view-details-btn border-0" name="submit" type="submit" value="উপস্থাপন  করুন">
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-lg-4 fs-f-bar">
                        @include('website._partials.details-sidebar')
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6207ea25fa99501b"></script>
@endsection