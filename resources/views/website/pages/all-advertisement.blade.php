@extends('layouts.website')
@section('content')

    <div class="all-advertisement">
        <section class="all-events-section category-blog">
                <div class="container pt-5 fs-wrapper">
                    <div class="row">
                        <div class="col-lg-12 fs-f-content">
                            <div class="fs-f-content-inner">
                                <div class="row">
                                    @if (count( $allAdvertisements ) > 0)
                                        @foreach ($allAdvertisements as $advertisement)                                   
                                            <div class="col-lg-3 print-archive-item-outer single">
                                                <div class="print-archive-item-inner single">
                                                    {{-- <h3 class="title ad">Ad Name Here</h3>
                                                    <h3 class="price">
                                                        <span class="prev mr-2"><del>$ 200</del></span>
                                                        <span class="now">$ 150</span>
                                                    </h3> --}}

                                                    <a class="image example-image-link" href="{{ asset($advertisement->image) }}" data-lightbox="example-set"  data-title="{{ $advertisement->name }}">
                                                        <img class="example-image" src="{{ asset($advertisement->image) }}" alt="{{ $advertisement->name }}" />
                                                    </a>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (count($allAdvertisements) > 0)
                        <div class="custom-pagination pt-5">
                            <nav>
                                {!! $allAdvertisements->links() !!}
                            </nav>
                        </div>
                    @endif
                </div>
            </section>
    </div>

@endsection
