@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div> Video list </div>
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
                                    <th>Video Title</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($videos->count() > 0)
                                    @foreach ($videos as $post)
                                    <tr>
                                        <td>{{ strip_tags(Str::limit($post->title, 30)) }}</td>
                                        <td width="15%">{{ $post->created_at->format('Y/m/d') }}</td>
                                        <td>
                                            {!! ($post->status) ? '<a class="badge badge-info">Publish </a>': '<a class=" badge badge-warning">Unpublish</a>' !!}
                                        </td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.video-category.edit', $post) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.video.destroy', $post) }}" accept-charset="UTF-8">
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
