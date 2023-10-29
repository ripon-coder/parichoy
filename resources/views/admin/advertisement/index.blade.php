@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Advertisement list
                    </div>
                    <a href="{{ route('admin.advertisement.create') }}" class="btn btn-primary add-new-modal-btn-link">Add New</a>
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
                                    <th>SL</th>
                                    <th>Company Name</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($allAdvertisements->count() > 0)
                                    @foreach ($allAdvertisements as $advertisement)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        
                                        <td>{{ strip_tags(Str::limit($advertisement->name, 30)) }}</td>
                                        <td>
                                            <a href="{{ asset($advertisement->image) }}">
                                                <img src="{{ asset($advertisement->image) }}" width="82" /></a>
                                        </td>
                                        {{-- <td>{!! strip_tags(Str::limit($advertisement->description, 60)) !!}
                                        </td> --}}
                                        {{-- <td>
                                            {!! ($advertisement->status) ? '<a class="badge badge-info">Publish </a>': '<a class=" badge badge-warning">Unpublish</a>' !!}
                                        </td> --}}
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.advertisement.edit', $advertisement->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.advertisement.destroy', $advertisement->id) }}" accept-charset="UTF-8">
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
