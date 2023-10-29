@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Post Category list
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
                                    <th>Category Title</th>
                                    <th>Category Priority</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($post_category->count() > 0)
                                    @foreach ($post_category as $category)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->position ? $category->position : "No Position"  }}</td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.categories.edit', $category->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- <form method="POST" action="{{ route('admin.post-category.destroy', $category->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="data-delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fas fa-trash"></i></button>
                                                </form> --}}
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
                        <h5 class="card-title">Add Category</h5>
                        <div class="modal-hide-btn"><i class="fas fa-times"></i></div>
                    </div>
                    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label class="">Category Name</label>
                            <input name="title" placeholder="Enter Category Name" type="text" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Sub Category</label><br>
                            <select name="parent_category_id"  class="form-control select2" required multiple="multiple" data-placeholder="Select Category">
                                @if(count($post_category))
                                    <option value="0">Uncategory</option>
                                    @foreach($post_category as $categoryData)
                                        @php $dash = ''; @endphp
                                        <option value="{{$categoryData->id}}">{{$categoryData->title}}</option>

                                        @if( count ( $categoryData->subCategories ))
                                            @include('admin.post-category.sub-category',['subcategories' => $categoryData->subCategories])
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Category Priority</label>
                            <input name="position" placeholder="Enter Category Priority" type="number" class="form-control" value="{{ old('position') }}">
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Status</label><br>
                            <select name="status" class="form-control" required>
                                <option selected value="1">Publish</option>
                                <option value="0">Unpublish</option>
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
