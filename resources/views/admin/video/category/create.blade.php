@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i></div>
                    <div>Video Category</div>
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
                                <form class="" action="{{ route('admin.video-category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="position-relative form-group">
                                        <label for="category_title" class="">Category Title</label>
                                        <input name="title" id="" placeholder="" type="text"
                                            class="form-control" value="{{ old('title') }}" required>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="description" class="">Description</label>
                                        <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
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
