@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                </div>
                <div>Subscribe User
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title"> Detailes Of {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</th>
                                    <td>
                                        @if ($user->profile_img)
                                            <img src="{{ asset($user->profile_img) }}" alt="" width="80">
                                        @else
                                            <img src="{{ asset('upload/subscribe-users/images.jpg') }}" alt="" width="80">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Year Of Birth</th>
                                    <td>{{ $user->yearOfBirth }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>

                                <tr>
                                    <th>Email </th>
                                    <td>{{ $user->email  }}</td>
                                </tr>
                                <tr>
                                    <th>Address </th>
                                    <td>{{ $user->usa_address  }}</td>
                                </tr>
                                <tr>
                                    <th>City </th>
                                    <td>{{ $user->city  }}</td>
                                </tr>
                                <tr>
                                    <th>State </th>
                                    <td>{{ $user->state  }}</td>
                                </tr>
                                <tr>
                                    <th>Zip Code </th>
                                    <td>{{ $user->zipcode  }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $user->country  }}</td>
                                </tr>

                                <tr>
                                    <th>Started At</th>
                                        <td>{{ $user->started_at  }}</td>
                                    </tr>
                                <tr>
                                    <th>Activity</th>
                                    <td>
                                        @if ($user->status === 1)
                                            <a onclick="return confirm('Are you sure want to deactive it?')" class="badge badge-info" href="{{ route('admin.subscribe-status', ['id'=> $user->id]) }}">Active</a>
                                        @else
                                            <a onclick="return confirm('Are you sure want to active it?')" class="badge badge-warning" href="{{ route('admin.subscribe-status', ['id'=> $user->id]) }}">Pending</a>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            {{-- <button class="mt-1 btn btn-primary p-store-btn">Submit</button> --}}

                            <a href="{{ route('admin.subscribe-user.index') }}" class="btn btn-primary float-right">Back to Subscribe User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
@stop
