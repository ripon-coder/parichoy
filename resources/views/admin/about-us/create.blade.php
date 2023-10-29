@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i></div>
                <div> Edit Contact Info </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Contact Info</h5>
                            <form class="" action="{{ route('admin.about-us.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                @if($about_us_data)

                                    {{-- <div class="position-relative form-group">
                                        <label class="">Image</label>
                                        <input class="form-control" type="file" name="profile_pic">
                                        @if($about_us_data->profile_pic)
                                            <img class="mt-2" style="max-width: 100px;" src="{{asset($about_us_data->profile_pic)}}">
                                        @endif
                                    </div> --}}
                                    {{-- <div class="position-relative form-group">
                                        <label class="">Profile Description</label>
                                        <textarea id="HCKEditor" name="profile_description" class="form-control" cols="30" rows="5" required>{{$about_us_data->profile_description}}</textarea>
                                    </div> --}}

                                    <div class="position-relative form-group">
                                        <label class="">Phone One</label>
                                        <input class="form-control" type="tel" name="phone" value="{{$about_us_data->phone}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Phone Two</label>
                                        <input class="form-control" type="tel" name="phone_two" value="{{$about_us_data->phone_two}}">
                                    </div>

                                    {{-- <div class="position-relative form-group">
                                        <label class="">Phone Three (AGS)</label>
                                        <input class="form-control" type="tel" name="phone_three" value="{{$about_us_data->phone_three}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Phone Four (Treasurer)</label>
                                        <input class="form-control" type="tel" name="phone_four" value="{{$about_us_data->phone_four}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Phone Five (Org Sec)</label>
                                        <input class="form-control" type="tel" name="phone_five" value="{{$about_us_data->phone_five}}">
                                    </div> --}}

                                    <div class="position-relative form-group">
                                        <label class="">Email</label>
                                        <input class="form-control" type="email" name="email" value="{{$about_us_data->email}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Email Two</label>
                                        <input class="form-control" type="email" name="email_two" value="{{$about_us_data->email_two}}">
                                    </div>


                                    {{-- <div class="position-relative form-group">
                                        <label class="">Email Three</label>
                                        <input class="form-control" type="email" name="email_three" value="{{$about_us_data->email_three}}">
                                    </div> --}}

                                    <div class="position-relative form-group">
                                        <label class="">Address</label>
                                        <textarea id="HCKEditor2" name="address" class="form-control" cols="30" rows="3" required>{{$about_us_data->address}}</textarea>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Embeded Link(Map)</label>
                                        <textarea name="embeded_link" class="form-control" cols="30" rows="5" required>{{$about_us_data->embeded_link}}</textarea>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Instragram Link</label>
                                        <input class="form-control" type="text" name="instra_link" value="{{$about_us_data->instra_link}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Facebook Link</label>
                                        <input class="form-control" type="text" name="fb_link" value="{{$about_us_data->fb_link}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Twitter Link</label>
                                        <input class="form-control" type="text" name="twitter_link" value="{{$about_us_data->twitter_link}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Youtube Link</label>
                                        <input class="form-control" type="text" name="youtube_link" value="{{$about_us_data->youtube_link}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Google Link</label>
                                        <input class="form-control" type="text" name="google_link" value="{{$about_us_data->google_link}}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Dashboard Logo</label>
                                        <input name="dashboard_image" type="file" class="form-control" accept=".jpeg,.jpg,.png" />
                                        @if(isset($about_us_data->dashboard_image))
                                            
                                                <div class="bg-secondary mt-2">
                                                    <img width="150px;" src="{{asset($about_us_data->dashboard_image)}}">
                                                </div>
                                        @endif
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Favicon Icon (32 X 32)px</label>
                                        <input name="favicon_icon" type="file" class="form-control" accept=".png"/>
                                        @if(isset($about_us_data))
                                            @if($about_us_data->favicon_icon)
                                                <div class="bg-secondary mt-2">
                                                    <img width="40" src="{{asset($about_us_data->favicon_icon)}}">
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Header Logo (320 X 75)px</label>
                                        <input name="header_logo" type="file" class="form-control" accept=".jpeg,.jpg,.png" />
                                        @if(isset($about_us_data))
                                            @if($about_us_data->header_logo)
                                                <div class="bg-secondary mt-2">
                                                    <img width="150px;" src="{{asset($about_us_data->header_logo)}}">
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    
                                    <div class="position-relative form-group">
                                        <label class="">Footer Logo (320 X 75)px</label>
                                        <input name="footer_logo" type="file" class="form-control" accept=".jpeg,.jpg,.png" />
                                        @if(isset($about_us_data))
                                            @if($about_us_data->footer_logo)
                                                <div class="bg-secondary">
                                                    <img width="150px;" src="{{asset($about_us_data->footer_logo)}}">
                                                </div>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Privacy Policy</label>
                                        <textarea id="HCKEditor3" class="form-control" name="privacy_policy" rows="3">{{ $about_us_data->privacy_policy }}</textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Terms Of Use</label>
                                        <textarea id="HCKEditor4" class="form-control" name="terms_of_use" rows="3">{{ $about_us_data->terms_of_use }}</textarea>
                                    </div>

                                @else
                                    <div class="position-relative form-group">
                                        <label class="">Name</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Image</label>
                                        <input class="form-control" type="file" name="profile_pic">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Profile Description</label>
                                        <textarea id="HCKEditor" name="profile_description" class="form-control" cols="30" rows="5" required></textarea>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Designation</label>
                                        <input class="form-control" type="text" name="designation">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Phone</label>
                                        <input class="form-control" type="tel" name="phone">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Email</label>
                                        <input class="form-control" type="email" name="email">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Address</label>
                                        <textarea id="HCKEditor2" name="address" class="form-control" cols="30" rows="5" required></textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Embeded Link(Map)</label>
                                        <textarea name="embeded_link" class="form-control" cols="30" rows="5" required></textarea>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Instragram Link</label>
                                        <input class="form-control" type="text" name="instra_link" value="{{ old('instra_link') }}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Facebook Link</label>
                                        <input class="form-control" type="text" name="fb_link" value="{{ old('fb_link') }}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Twitter Link</label>
                                        <input class="form-control" type="text" name="twitter_link" value="{{ old('twitter_link') }}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Youtube Link</label>
                                        <input class="form-control" type="text" name="youtube_link" value="{{ old('youtube_link') }}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">LinkedIn</label>
                                        <input class="form-control" type="text" name="google_link" value="{{ old('google_link') }}">
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Dashboard Logo</label>
                                        <input name="dashboard_image" type="file" class="form-control" accept=".jpeg,.jpg,.png" />
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Favicon Icon (32 X 32)px</label>
                                        <input name="favicon_icon" type="file" class="form-control" accept=".png"/>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Header Logo (320 X 75)px</label>
                                        <input name="header_logo" type="file" class="form-control" accept=".jpeg,.jpg,.png" />
                                    </div>
                                    
                                    <div class="position-relative form-group">
                                        <label class="">Footer Logo (320 X 75)px</label>
                                        <input name="footer_logo" type="file" class="form-control" accept=".jpeg,.jpg,.png" />
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Privacy Policy</label>
                                        <textarea id="HCKEditor3" class="form-control" name="privacy_policy" rows="3">{{ old('privacy_policy') }}</textarea>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Terms Of Use</label>
                                        <textarea id="HCKEditor4" class="form-control" name="terms_of_use" rows="3">{{ old('terms_of_use') }}</textarea>
                                    </div>
                                @endif
                                <button class="mt-1 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
@stop
