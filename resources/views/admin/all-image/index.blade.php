@extends('layouts.admin')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>All Image list
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
                                    <th>Url</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($all_image_data->count() > 0)
                                    @foreach ($all_image_data as $image)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td class="all-image-img">
                                            <img src="{{asset($image->image_url)}}">
                                        </td>
                                        <td>
                                            @if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
                                                <input type="text" name="" value="{{ 'http://'.$_SERVER['HTTP_HOST'].'/'.$image->image_url }}" class="copy-input" id="copyInput" readonly>
                                            @elseif(!isset($_SERVER['HTTP']) || $_SERVER['HTTP'] != 'on')
                                                <input type="text" name="" value="{{ 'https://'.$_SERVER['HTTP_HOST'].'/'.$image->image_url }}" class="copy-input" id="copyInput" readonly>
                                            @endif
                                            <div class="tooltip custom">
                                                <button class="copy-input-btn">
                                                  <span class="tooltiptext my-tooltip">Copy to clipboard</span>
                                                  <i class="fas fa-clipboard-list"></i>
                                                  </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-btns">
                                               {{--  <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.post-category.edit', $category->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a> --}}
                                                <form method="POST" action="{{ route('admin.all-image.destroy', $image->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="data-delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <h3 style="text-alig:center"> No Post Found</h3>
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
                        <h5 class="card-title">Upload New Image</h5>
                        <div class="modal-hide-btn"><i class="fas fa-times"></i></div>
                    </div>
                    <form action="{{ route('admin.all-image.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label class="">Images(Multiple)</label>
                            <input type="file" name="image_url[]" type="text" class="form-control" required multiple>
                        </div>
                        <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                        <button class="mt-1 btn modal-hide-btn cancel" type="reset">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
