@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Print & Media Category List
                    </div>
                    <button type="button" class="btn btn-primary float-right add-new-modal-btn">Add New Print Media Category</button>
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
                                    <th>Print Media Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($print_media_categories->count() > 0)
                                    @foreach ($print_media_categories as $category)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $category->title }}</td>
                                        
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.print-media-categories.edit', $category->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- <form method="POST" action="{{ route('admin.print-media-categories.destroy', $category->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="data-delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fas fa-trash"></i></button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <h3 style="text-alig:center"> No Print Media Category Found</h3>
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
                        <h5 class="card-title">Add Print Media Category</h5>
                        <div class="modal-hide-btn"><i class="fas fa-times"></i></div>
                    </div>
                    <form action="{{ route('admin.print-media-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label class="">Print Media Category Name</label>
                            <input name="title" placeholder="Enter Category Name" type="text" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                        <button class="mt-1 btn modal-hide-btn cancel" type="reset">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
