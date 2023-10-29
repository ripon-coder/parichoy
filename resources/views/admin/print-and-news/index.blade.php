@extends('layouts.admin')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Print And News List
                    </div>
                    <button type="button" class="btn btn-primary float-right add-new-modal-btn">Add New</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Simple table</h5> --}}
                        <table id="table_id" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($print_and_news_data->count() > 0)
                                    @foreach ($print_and_news_data as $print_and_news_item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td class="all-image-img">
                                            <img src="{{asset($print_and_news_item->image)}}">
                                        </td>
                                        <td>
                                            {{$print_and_news_item->link}}
                                        </td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.print-and-news.edit', $print_and_news_item->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.print-and-news.destroy', $print_and_news_item->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="data-delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <h3 style="text-alig:center"> No Print & Media Found</h3>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Category Form Modal -->
    <div class="add-new-modal-wrapper">
        <div class="add-new-modal-inner">
            <div class="main-card card">
                <div class="card-body">
                    <div class="card-top-wrapper">
                        <h5 class="card-title">Insert New Print And News</h5>
                        <div class="modal-hide-btn"><i class="fas fa-times"></i></div>
                    </div>
                    <form action="{{ route('admin.print-and-news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label class="">News Logo</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Link</label>
                            <input type="text" name="link" class="form-control" required>
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Print & Media Category</label>
                            <select name="printnewscategory_id" class="form-control" required>
                                <option value=""> {{ __('-- Select Print Media Category --') }} </option>
                                @if (count($printMeidaCategories) > 0)
                                    @foreach ($printMeidaCategories as $mediaCategory)
                                        <option value="{{ $mediaCategory->id }}">{{ $mediaCategory->title }}</option>
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
@stop
