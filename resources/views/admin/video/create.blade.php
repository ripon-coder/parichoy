@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i></div>
                    <div>Video</div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <form class="" action="{{ route('admin.video.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="position-relative form-group">
                                        <label for="title" class="">Title</label>
                                        <input name="title" id="" placeholder="" type="text"
                                            class="form-control" value="{{ old('title') }}" required>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Select Category</label><br>
                                        <select class="form-control select2" name="category_id"
                                            data-placeholder="Select Category">
                                            {{-- <option value="0">Uncategory</option> --}}
                                            @if (count($video_category) > 0)
                                                @foreach ($video_category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            @else
                                                <option value="">No Category Found</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="youtube_id" class="">Youtube Video ID</label><br>
                                        <img src="{{asset('assets/admin/images/video-id.png')}}" alt="">
                                        <input name="youtube_id" id="" placeholder="" type="text"
                                            class="form-control" value="{{ old('youtube_id') }}" required>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="description" class="">Description</label>
                                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="thumbnail" class="">Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail" required>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Slider</label>
                                        <small class="form-text text-info pb-1">Show the latest 10 videos in a slider.</small>

                                        <select name="feature" class="form-control" required>
                                            <option value="1">Yes</option>
                                            <option selected value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label class="">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option selected value="1">Publish</option>
                                            <option value="0">Unpublish</option>
                                        </select>
                                    </div>

                                    <button class="mt-1 btn btn-primary p-store-btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
