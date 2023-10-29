@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                </div>
                <div>
                    Edit Home Intro Page
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Home Intro</h5>
                            <form class="" action="{{ route('admin.home-intro.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if($home_intro_data)
                                <div class="position-relative form-group">
                                    <label class="">Image</label>
                                    <input class="form-control" type="file" name="image">
                                    @if(isset($home_intro_data->image))
                                        <img class="mt-2" style="max-width: 100px;" src="{{asset($home_intro_data->image)}}">
                                    @endif
                                </div>

                                <div class="position-relative form-group">
                                    <label class="">Instragram Link</label>
                                    <input class="form-control" type="text" name="instra_link" value="{{$home_intro_data->instra_link}}">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Facebook Link</label>
                                    <input class="form-control" type="text" name="fb_link" value="{{$home_intro_data->fb_link}}">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Twitter Link</label>
                                    <input class="form-control" type="text" name="twitter_link" value="{{$home_intro_data->twitter_link}}">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Youtube Link</label>
                                    <input class="form-control" type="text" name="youtube_link" value="{{$home_intro_data->youtube_link}}">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Google Link</label>
                                    <input class="form-control" type="text" name="google_link" value="{{$home_intro_data->google_link}}">
                                </div>
                            @else
                                <div class="position-relative form-group">
                                    <label class="">Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Top Title</label>
                                    <input class="form-control" type="text" name="top_title">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Main Title</label>
                                    <input class="form-control" type="text" name="main_title">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Sub Title</label>
                                    <input class="form-control" type="text" name="sub_title">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Description</label>
                                    <textarea class="form-control" rows="5" name="description" rows="4"></textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Instragram Link</label>
                                    <input class="form-control" type="text" name="instra_link">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Facebook Link</label>
                                    <input class="form-control" type="text" name="fb_link">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Twitter Link</label>
                                    <input class="form-control" type="text" name="twitter_link">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Youtube Link</label>
                                    <input class="form-control" type="text" name="youtube_link">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Google Link</label>
                                    <input class="form-control" type="text" name="google_link">
                                </div>
                                {{-- <div class="position-relative form-group">
                                    <label class="">Profile Description</label>
                                    <textarea id="HCKEditor" name="top_title" class="form-control" cols="30" rows="5" required></textarea>
                                </div> --}}
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
