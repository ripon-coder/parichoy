@extends('layouts.website')
@section('content')

	<!-- Membership Application Section Start -->
	<section class="membership-application-section" id="membershipApplicationForm">
		<div class="container">
			<div class="row">
                <div class="col-sm-7 m-auto">
                    <div class="main-heading application-title" style="margin: 20px 0 0 0">
                        <h2 class="main-title">Membership Register Form</h2>
                    </div>
                </div>
            </div>
			<div class="mem-application-form-wrapper">
				<div class="col-md-9 m-auto mem-application-form-inner">

                    @include('error.error')

                   {{-- <form class="row" action="{{ route('subscribe-user-profile.store') }}" method="POST" enctype="multipart/form-data"> --}}


                   <form class="row" action="{{ route('subscribe-user-data') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="splan" value={{ $plan }}>
						<div class=" col-md-9 m-auto">
                            <div class="row">

                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="text" value="{{ old('fname') }}" name="fname" placeholder="First Name*" required>
                                </div>

                                <div class="col-md-4 col-sm-12 px-md-1 input-group">
                                    <input type="text" value="{{ old('mname') }}" name="mname" placeholder="Middle Name">
                                </div>

                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="text" value="{{ old('lname') }}" name="lname" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="text" value="{{ old('phone') }}" name="phone" placeholder="Phone No*">
                                </div>

                                <div class="col-md-4 col-sm-12 px-md-1 input-group">
                                    <input type="number" value="{{ old('yearOfBirth') }}" name="yearOfBirth" placeholder="Year Of Birth*" required>
                                </div>

                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="email" value="{{ old('email') }}" name="email" placeholder="Email*" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 pr-0 input-group">
                                    <input type="password" value="" name="password" placeholder="Password* (Min 8 characters)" required>
                                </div>

                                <div class="col-md-6 col-sm-12 input-group">
                                    <input type="password" value="" name="confirm_password" placeholder="Confirm Password* (Min 8 characters)" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-sm-12 pr-1 input-group">
                                    <input type="text" value="{{ old('usa_address') }}" name="usa_address" placeholder="USA Address*"  required>
                                </div>

                                <div class="col-md-4 col-sm-12 pl-3 input-group">
                                    <input type="text" value="{{ old('city') }}" name="city" placeholder="City*" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12  input-group">
                                    <select name="state" required>
                                        <option value="">Select State *</option>
                                        @forelse ($states as $state)
                                            <option value="{{ $state->stateName }}" {{ (old('state') == $state->stateName )?'selected':'' }}>{{ $state->stateName }}</option>
                                        @empty
                                            <option>State No Fount</option>
                                        @endforelse
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-12 px-md-1 input-group">
                                    <input type="text" value="{{ old('zipcode') }}" name="zipcode" placeholder="ZIP Code*" required>
                                </div>

                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="text" name="country" placeholder="Country*" value="USA" readonly="" required>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-8 col-sm-12 pr-1 input-group">
                                    <input type="text" value="{{ old('bd_address') }}" name="bd_address" placeholder="Bangladesh Address*"  required>
                                </div>

                                <div class="col-md-4 col-sm-12 input-group">
                                    <select name="bd_upazila">
                                        <option value="">Select Upazila *</option>
                                        <option value="Ajmiriganj" {{ (old('bd_upazila') == 'Ajmiriganj' )?'selected':'' }}>Ajmiriganj</option>
                                        <option value="Baniachang" {{ (old('bd_upazila') == 'Baniachang' )?'selected':'' }}>Baniachang</option>
                                        <option value="Bahubal" {{ (old('bd_upazila') == 'Bahubal' )?'selected':'' }}>Bahubal</option>
                                        <option value="Chunarughat" {{ (old('bd_upazila') == 'Chunarughat' )?'selected':'' }}>Chunarughat</option>
                                        <option value="Habiganj Sadar" {{ (old('bd_upazila') == 'Sadar' )?'selected':'' }}>Habiganj Sadar</option>
                                        <option value="Lakhai" {{ (old('bd_upazila') == 'Lakhai' )?'selected':'' }}>Lakhai</option>
                                        <option value="Madhabpur" {{ (old('bd_upazila') == 'Madhabpur' )?'selected':'' }}>Madhabpur</option>
                                        <option value="Nabiganj" {{ (old('bd_upazila') == 'Nabiganj' )?'selected':'' }}>Nabiganj</option>
                                        <option value="Sayestaganj" {{ (old('bd_upazila') == 'Sayestaganj' )?'selected':'' }}>Sayestaganj</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="row">

                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="url" value="{{ old('facebook') }}" name="facebook" placeholder="Facebook">
                                </div>

                                <div class="col-md-4 col-sm-12 px-md-1 input-group">
                                    <input type="url" value="{{ old('twitter') }}" name="twitter" placeholder="Twitter Link">
                                </div>

                                <div class="col-md-4 col-sm-12 input-group">
                                    <input type="url" value="{{ old('other_social') }}" name="other_social" placeholder="Other Social Account">
                                </div>

                                <div class="col-md-12 input-group">
                                    <textarea name="information" placeholder="Write something about you and your family">{{ old('information') }}</textarea>
                                </div>

                                <div class="col-md-12 col-sm-12 input-group email">
                                    <label for="profile_img">Upload Your Photo</label>
                                    <input id="profile_img" class="p-0 " type="file" name="profile_img" placeholder="Image Upload" accept="image/*,.jpg,.jpeg,.png">
                                </div>

                                <div class="col-md-12 col-sm-12 input-group button-wrapper">
                                    <button type="submit">Submit</button>
                                </div>

                                <div class="col-md-12 m-auto pt-4 input-group application-download-btn  mt-4">
                                    <a class="m-auto" href="{{ asset('/') }}assets/website/pdf/Job-Application-Form.pdf"><i class="fas fa-download"></i> Download Application Form</a>
                                </div>
                            </div>
						</div>
                        {{-- @if ($errors->any() || Session::has('message'))
                            <script>
                            window.location.hash = '#membershipApplicationForm';
                            </script>
                        @endif --}}
                    </form>

				</div>
			</div>
			</div>
		</div>
	</section>
	<!-- //Membership Application Section End -->


@endsection
