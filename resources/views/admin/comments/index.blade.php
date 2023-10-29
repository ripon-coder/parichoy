@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div> Comment list </div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($comments->count() > 0)
                                    @foreach ($comments as $comment)
                                    <tr>
                                        {{-- <td>{{ $loop->index+1 }}</td> --}}
                                        <td>{{ strip_tags(Str::limit($comment->name, 30)) }}</td>
                                        <td>{{ $comment->email }}</td>
                                        
                                        <td>{{ $comment->website }}</td>
                                        <td>{!! (Str::limit(strip_tags($comment->comment), 60)) !!}</td>
                                        <td>
                                            @if ($comment->is_active)
                                                <a class="badge badge-info" href="{{ route('admin.comments.show', $comment->id) }}">Approved </a>
                                            @else
                                            <a class=" badge badge-warning" href="{{ route('admin.comments.show', $comment->id) }}">Unapproved</a>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.post.edit', $comment->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.comments.destroy', $comment->id) }}" accept-charset="UTF-8">
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
