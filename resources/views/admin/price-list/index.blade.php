@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading w-100">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i></div>
                    <div>Price list</div>
                    <a href="{{ route('admin.pricing-list.create') }}" class="btn btn-primary float-right add-item-btn">Add Price List</a>
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
                                    <th>ID</th>
                                    <th>Price</th>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>


                                @if($priceLists->count() > 0)
                                    @foreach ($priceLists as $priceList)
                                    <tr>
                                        <td>#{{ $loop->index+1 }}</td>
                                        <td>{{ $priceList->price }}</td>
                                        <td>{{ $priceList->title }}</td>
                                        <td>{{ $priceList->duration }} Day</td>
                                        <td> {!! Str::limit($priceList->content, 100, '...') !!} </td>
                                    </td>
                                        <td>
                                            {!! ($priceList->status) ? '<a class="badge badge-info">Publish </a>': '<a class=" badge badge-warning">Unpublish</a>' !!}
                                        <td>
                                            <div class="action-btns">
                                                <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.pricing-list.edit', $priceList->id) }}">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.pricing-list.destroy', $priceList->id) }}" accept-charset="UTF-8">
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
