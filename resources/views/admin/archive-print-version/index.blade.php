@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div> Archive Print Version list </div>
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
                                    <th>Print Version Title</th>
                                    <th>Print Version Image</th>
                                    <th>Print Version File</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($archivPrintVersions->count() > 0)
                                    @foreach ($archivPrintVersions as $printVersion)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        
                                        </td>
                                        <td>{{ $printVersion->title }}</td>
                                        <td>
                                            <a href="{{ asset($printVersion->image) }}">
                                                <img src="{{ asset($printVersion->image) }}" width="82" />
                                            </a>
                                        </td>

                                        <td>
                                            <img src="{{ asset('/') }}assets/admin/images/pdf.png" width="82" />
                                        </td>
                                        
                                        <td>
                                            {!! ($printVersion->status) ? '<a class="badge badge-info">Publish </a>': '<a class=" badge badge-warning">Unpublish</a>' !!}
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.archive-print-versions.edit', $printVersion->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.archive-print-versions.destroy', $printVersion->id) }}" accept-charset="UTF-8">
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
