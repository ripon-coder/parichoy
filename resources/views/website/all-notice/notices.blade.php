@extends('layouts.website')
@section('content')
    <!-- Donate Organization Section -->
    <section class="donate-organization-setion">
        <div class="container">
            <div class="heading mb-4">
                <h2 class="title text-center" style="font-weight: 900">Notice Board</h2>
            </div>
            <div class="row">
            @if ( $notices->count() > 0)
                @foreach ($notices->skip(1) as $notice)
                    <div class="col-md-4 upcoming-event-section-wrapper mb-4">
                        <div class="upcoming-event-section notice">
                            <div class="upcoming-event-item notice-item">
                                <div class="left-box">
                                    <h2 class="title"><a href="{{ route('notice-detailes', $notice->id) }}">{{ $notice->noticeTitle }}</a></h2>
                                </div>
                                <div class="location-wrap">
                                    <h3 class="time-location">
                                        <span class="icon"><i class="far fa-clock"></i></span>
                                        at
                                        <span class="from-time">{{ $notice->noticeTitme }}</span>
                                        {{-- -
                                        <span class="to-time">07.00pm</span> --}}
                                    </h3>
                                    <h3 class="time-location">
                                        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                        {!! $notice->noticeLocation !!}
                                    </h3>
                                </div>
                                <div class="right-box">
                                    <div class="event-date">
                                        <span class="date">{{ $notice->noticeDate }}</span>
                                        <span class="month">{{ $notice->noticeMonth }}</span>
                                    </div>
                                </div>

                                <p class="text-justify mb-0">{!! Str::limit(strip_tags($notice->noticeDescription), 220) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <h2>No item found</h2>
                @endif
            </div>
            @if($notices->count() > 0)
                <div class="pagination-section d-flex justify-content-center mb-4">
                    {!! $notices->links() !!}
                </div>
            @endif
        </div>
    </section>
    <!-- Donate Organization Section -->
@endsection