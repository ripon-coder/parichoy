@extends('layouts.website')
@section('styles')
    <link rel="stylesheet" href="{{ asset('/') }}assets/website/css/subscribe-user.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/website/css/subscription.css">
@endsection
@section('content')

		<!-- About US Section Start -->
	<section class="about-us-main-info-section pt-4">
		<div class="container">
			<div class="main-heading">
				<h2 class="main-title">User Profile</h2>
			</div>
		</div>
	</section>
	<!-- //About Us Section End -->


    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            {{-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav> --}}
            <!-- /Breadcrumb -->
            <div class="row gutters-sm justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if ($user->profile_img)
                                    <img src="{{ asset($user->profile_img) }}" alt="" class="border user-img-cc rounded-circle" width="100" height="100">
                                @else
                                    <img class="border rounded-circle" src="{{ asset('upload/subscribe-users/images.jpg') }}" alt="" class="user-img-cc rounded-circle" width="100" height="100">
                                @endif


                                <div class="mt-3">
                                    <h4>{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</h4>
                                    @if($user->member_plan == 'Free')
                                        <span class="badge badge-info mb-3"> {{ $user->member_plan }} </span>
                                    @else
                                        <span class="badge badge-success mb-3"> {{ $user->member_plan }} </span>
                                    @endif

                                    <p class="text-secondary mb-1 text-left"><strong>Phone:</strong> {{ $user->phone }}</p>
                                    <p class="text-secondary mb-1 text-left"><strong>Email:</strong> {{ $user->email }}</p>
                                    <p class="text-muted font-size-sm text-left"><strong>Country:</strong> {{ $user->country }}</p>

                                    @php
                                        $duration = $user->duration;
                                        $startAt= \Carbon\Carbon::parse( $user->started_at);
                                        $now = \Carbon\Carbon::now();
                                        $diff = $startAt->diffInDays($now);
                                    @endphp

                                    @if(isset($user->duration) && $duration < $diff)
                                        <div class="subscription-renew-content-wrapper text-left mb-5">
                                            <h5>Your Subscription Has Been Expired!</h5>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="renew-subscription-modal-btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Renew Subscription
                                            </button>
                                        </div>
                                    @else
                                        <div class="subscription-renew-content-wrapper text-left mb-5">
                                            <h6>You can upgrade your subscription plan from here.</h6>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="renew-subscription-modal-btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Upgrade Subscription
                                            </button>
                                        </div>
                                    @endif

                                    <a class="btn btn-warning user-logout-btn btn-sm float-left" href="{{route('membership.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="logout"> Logout</a>
                                    <form id="frm-logout" action="{{ route('membership.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 profile-section">
                    @include('error.error')
                    <form action="{{ route('update-subscribe-user') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Image: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="file" name="profile_img">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="fname" value="{{ $user->fname }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Middle Name: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="mname" value="{{ $user->mname }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="lname" value="{{ $user->lname }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Year of Birth: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="yearOfBirth" value="{{ $user->yearOfBirth }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="email" value="{{ $user->email  }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Change Password:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="usa_address" value="{{ $user->usa_address }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">City:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="city" value="{{ $user->city }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">State:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="state" value="{{ $user->state }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Zip Code:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="zipcode" value="{{ $user->zipcode }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Country:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="country" value="{{ $user->country }}">
                                    </div>
                                </div>
                                <hr>
                               
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Facebook:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="facebook" value="{{ $user->facebook }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Twitter:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="twitter" value="{{ $user->twitter }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Other Social:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="text" name="other_social" value="{{ $user->other_social }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Information:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="information" id="" cols="40" rows="3">{{ $user->information }}</textarea>
                                    </div>
                                </div>

                                 <button class="mt-1 btn btn-primary mt-5">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade membership-subscription-renew-wrapper" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header px-5">
        <h5 class="modal-title" id="exampleModalLongTitle">Renew Subscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        <div class="row">
            <div class="col-md-5 @if (count($priceLists) == 0) m-auto @endif">
                <div class="ihc-level-item">
                    <div class="ihc-level-item-wrap">
                        <div class="ihc-level-item-top">
                            <div class="ihc-level-item-title">Free</div>
                        </div>
                        <div class="ihc-level-item-price">Renew Now!</div>
                        <div class="ihc-level-item-content"><strong>Free</strong> level allowing limited access to most of our content.</div>
                        <div class="ihc-level-item-bottom">
                            <form method="get" action="{{ route('subscribe-renew') }}">
                                <input type="hidden" name="plan" value="0">
                                <button class="data-delete-btn" type="submit">Renew</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($priceLists) > 0)
                @foreach ($priceLists as $item)
                    <div class="col-md-4">
                        <div class="ihc-level-item">
                            <div class="ihc-level-item-wrap mb-4">
                                <div class="ihc-level-item-top">
                                    <div class="ihc-level-item-title">{{ $item->title }}</div>
                                </div>

                                <div class="ihc-level-item-price">Only ${{ number_format($item->price, 2) }}</div>
                                <div class="ihc-level-item-content">{!! $item->content !!}</div>
                                <div class="ihc-level-item-bottom">
                                    <form method="get" action="{{ route('subscribe-renew') }}">
                                        <input type="hidden" name="plan" value="{{ $item->id }}">
                                        <button type="submit">Renew</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
