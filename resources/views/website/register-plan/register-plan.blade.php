@extends('layouts.website')
@section('content')

    <!-- About US Section Start -->
    <section class="about-us-main-info-section">
        <div class="container">
            <div class="main-heading mb-3">
                <h2 class="main-title">Membership</h2>
            </div>
        </div>
    </section>
    <!-- //About Us Section End -->


    <!-- Membership Application Section Start -->
    <section class="membership-application-section" id="membershipApplicationForm">
        <div class="container">

            <div class="row">
                <div class="col-md-4 mb-4 {{ (count($priceLists) == 0) ? 'm-auto pb-4' : '' }}">
                    <div class="ihc-level-item">
                        <div class="ihc-level-item-wrap">
                            <div class="ihc-level-item-top">
                                <div class="ihc-level-item-title"> Membership-Free</div>
                            </div>
                            <div class="ihc-level-item-price">Sign up Now!</div>
                            <div class="ihc-level-item-content"><strong>Free</strong> level allowing limited access to most of our content.</div>
                            <div class="ihc-level-item-bottom">
                                <form method="get" action="{{ route('subscribe-register-form') }}">
                                    <input type="hidden" name="plan" value="0">
                                    <button type="submit">Sign Up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if (count($priceLists) > 0)
                    @foreach ($priceLists as $item)
                        <div class="col-md-4 mb-md-5 mb-sm-1 margin-bottom">
                            <div class="ihc-level-item">
                                <div class="ihc-level-item-wrap">
                                    <div class="ihc-level-item-top">
                                        <div class="ihc-level-item-title">{{ $item->title }}</div>
                                    </div>

                                    <div class="ihc-level-item-price">Only ${{ number_format($item->price, 2) }}</div>
                                    <div class="ihc-level-item-content">{!! $item->content !!}</div>
                                    <div class="ihc-level-item-bottom">
                                        <form method="get" action="{{ route('subscribe-register-form') }}">
                                            <input type="hidden" name="plan" value="{{ $item->id }}">
                                            <button type="submit">Sign Up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

@endsection
