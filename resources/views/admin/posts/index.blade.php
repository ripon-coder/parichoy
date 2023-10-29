@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div> Post list </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table id="table_id" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th>SL</th> --}}
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count() > 0)
                                    @foreach ($posts as $post)
                                    <tr>
                                        {{-- <td>{{ $loop->index+1 }}</td> --}}
                                        <td>{{ strip_tags(Str::limit($post->title, 30)) }}</td>
                                        <td width="30%">
                                            {{-- {{ ($post->category) ? $product->category->category_name : "No Category" }} --}}

                                            @foreach ($post->categories as $category)
                                                @if ($category->title)
                                                    {{-- <span class="badge badge-primary"></span> --}}
                                                    {{ $category->title }},
                                                @endif
                                            @endforeach
                                        </td>
                                        
                                        <td>
                                            <a href="{{ asset($post->image) }}">
                                                <img src="{{ asset($post->image) }}" width="82" /></a>
                                        </td>
                                        <td>{!! (Str::limit(strip_tags($post->description), 60)) !!}</td>
                                        <td width="15%">{{ $post->created_at->format('Y/m/d') }}</td>
                                        <td>
                                            {!! ($post->status) ? '<a class="badge badge-info">Publish </a>': '<a class=" badge badge-warning">Unpublish</a>' !!}
                                        </td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.post.edit', $post->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.post.destroy', $post->id) }}" accept-charset="UTF-8">
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
@stop
