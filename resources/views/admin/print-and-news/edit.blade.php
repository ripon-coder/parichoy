@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                </div>
                <div>Edit Print & Media
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
                            <h5 class="card-title">Edit Print & Media</h5>

                            <form action="{{ route('admin.print-and-news.update', $print_and_news_data['id']) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="position-relative form-group">
                                    <label class="">News Logo</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset($print_and_news_data['image']) }}" style="width: 150px;margin-top: 10px;">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Link</label>
                                    <input type="text" name="link" class="form-control" required value="{{ $print_and_news_data['link'] }}">
                                </div>
                                
                                <div class="position-relative form-group">
                                    <label class="">Print & Media Category</label>
                                    <select name="printnewscategory_id" class="form-control" required>
                                        <option value=""> {{ __('-- Select Print Media Category --') }} </option>
                                        @if (count($printMeidaCategories) > 0)
                                            @foreach ($printMeidaCategories as $mediaCategory)
                                                <option value="{{ $mediaCategory->id }}" {{ $print_and_news_data->printnewscategory_id ==  $mediaCategory->id ? 'selected' : ''}}>{{ $mediaCategory->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                                <button class="mt-1 btn modal-hide-btn cancel" type="reset">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
