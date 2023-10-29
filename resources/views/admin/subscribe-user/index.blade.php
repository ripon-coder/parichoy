@extends('layouts.admin')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Subscribe User List
                    </div>
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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Plan</th>
                                    <th>Validity Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($allusers->count() > 0)
                                    @foreach ($allusers as $alluser)
                                        @php
                                            $duration = $alluser->duration;
                                            $startAt= \Carbon\Carbon::parse( $alluser->started_at);
                                            $now = \Carbon\Carbon::now();
                                            $diff = $startAt->diffInDays($now);
                                        @endphp
                                        @if($duration >= $diff || $duration == null)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $alluser->fname }} {{ $alluser->mname }} {{ $alluser->lname }}</td>
                                                <td>
                                                    @if ($alluser->profile_img)
                                                        <img src="{{ asset($alluser->profile_img) }}" alt="" width="80">
                                                    @else
                                                        <img src="{{ asset('upload/subscribe-users/images.jpg') }}" alt="" width="80">
                                                    @endif
                                                </td>
                                                <td>{{ $alluser->phone }}</td>
                                                <td>{{ $alluser->email }}</td>

                                                <td>
                                                    {{ $alluser->member_plan }}
                                                </td>

                                                <td>
                                                    {{ ($duration != null)?$duration-$diff.' Days':'Free Member' }}
                                                </td>

                                                <td>
                                                    @if ($alluser->status === 1)
                                                    </a>
                                                        <a class="badge badge-info" href="{{ route('admin.subscribe-status', ['id'=> $alluser->id]) }}" data-toggle="tooltip" data-placement="top" title="Make Inactive"><div>Active</div></a>
                                                    @else
                                                        <a class="badge badge-warning" href="{{ route('admin.subscribe-status', ['id'=> $alluser->id]) }}" data-toggle="tooltip" data-placement="top" title="Make Active"><div>Inactive</div></a>
                                                    @endif
                                                </td>


                                                <td>
                                                    <div class="action-btns">
                                                        <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('admin.subscribe-user.edit', $alluser->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                        </a>

                                                        <a class="data-edit-btn" data-toggle="tooltip" data-placement="top" title="Show" href="{{ route('admin.subscribe-user.show', $alluser->id) }}">
                                                        <i class="fas fa-eye"></i>
                                                        </a>


                                                        <form method="POST" action="{{ route('admin.subscribe-user.destroy', $alluser->id) }}" accept-charset="UTF-8">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="data-delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Category"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
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
