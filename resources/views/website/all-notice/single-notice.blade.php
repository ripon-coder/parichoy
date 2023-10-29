@extends('layouts.website')
@section('content')
	<!-- Events Start -->
	<section class="all-events-section">
		<div class="container">
			<div class="latest-update-news-item-wrapper">
				<div class="row">
					<div class="col-md-8 m-auto single-post-outer">
						<div class="single-post-inner">
							<div class="midddle-content">
								{{-- <div class="mt-4 mb-2">
									Category Name
								</div> --}}

								<h2 class="post-main-title" style="font-size: 30px">{{ $notice->noticeTitle }}</h2>
								<h3 class="date-time">
									Published On  {{ date('M d, Y', strtotime($notice->created_at)) }}
								</h3>
							</div>
							<div class="description">
								{!! $notice->noticeDescription !!}
							</div>

                            <div class="social_share mt-4">
                                <h5>Social Share:</h5>
                                <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6072bd67e506e0ec"></script>

                            </>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Events End -->
@endsection
