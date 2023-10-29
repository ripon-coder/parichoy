@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                </div>
                <div>Add Banner Slider
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
                            <h5 class="card-title">Add Banner Slide</h5>
                            <form class="" action="{{ route('admin.banner-slide.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="position-relative form-group">
                                    <label class="">Banner Image</label>
                                    <input class="form-control" type="file" name="banner_img[]" accept="image/*" multiple required>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input name="first_banner" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1">
                                    <label class="form-check-label" for="inlineCheckbox3">Slider For First Banner</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input name="second_banner" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1">
                                    <label class="form-check-label" for="inlineCheckbox3">Slider For Second Banner</label>
                                </div>
                                <div class="position-relative form-grou"></div>


                                <button class="mt-1 btn btn-primary p-store-btn">Submit</button>

                                <a href="{{ route('admin.banner-slide.index') }}" class="btn btn-primary float-right">Back to Manage Slide</a>
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
