@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                </div>
                <div>Edit Subscribe User
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
                            <h5 class="card-title">Edit Content</h5>
                            <form action="{{ route('admin.subscribe-user.update', $user->id) }}" method="post">
                                @csrf
                                @method("PUT")

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
                                    {{-- <tr>
                                        <th>Member Plan</th>
                                        <td>
                                            <select name="member_plan">
                                                <option value="" value="{{ $user->member_plan }}">{{ $user->member_plan }}</option>
                                            </select>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th>Year Of Birth</th>
                                        <td><input class="form-control" type="text" name="yearOfBirth" value="{{ $user->yearOfBirth }}"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><input class="form-control" type="text" name="phone" value="{{ $user->phone }}"></td>
                                    </tr>

                                    <tr>
                                        <th>Email </th>
                                        <td><input class="form-control" type="text" name="email " value="{{ $user->email  }}"></td>
                                    </tr>
                                    <tr>
                                        <th>Address </th>
                                        <td><textarea class="form-control" name="usa_address" id="" cols="30" rows="2">{{ $user->usa_address  }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <th>City </th>
                                        <td><input class="form-control" type="text" name="city" value="{{ $user->city }}"></td>
                                    </tr>
                                    <tr>
                                        <th>State </th>
                                        <td><input class="form-control" type="text" name="state" value="{{ $user->state  }}"></td>
                                    </tr>
                                    <tr>
                                        <th>Zip Code </th>
                                        <td><input class="form-control" type="text" name="zipcode" value="{{ $user->zipcode  }}"></td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td><input class="form-control" type="text" name="country" value="{{ $user->country  }}"></td>
                                    </tr>

                                    <tr>
                                        <th>Started At</th>
                                        <td><input class="form-control" type="text" data-provide="datepicker" class="datepicker" name="started_at" value="{{$user->started_at->format('m/d/Y')  }} " ></td>
                                        {{-- <td><input type="datetime-local" name="started_at" value="{{date('Y-m-d H:i:s', strtotime($user->started_at))  }} " ></td> --}}
                                    </tr>
                                    <tr>
                                        <th>About Information</th>
                                        <td><textarea id="HCKEditor" class="form-control" name="information" id="" cols="30" rows="4">{{ $user->information  }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Activity</th>
                                        <td>
                                            <select name="status" class="form-control">
                                                <option {{($user->status == 0) ?'selected':''}} value="0">Pending</option>
                                                <option {{($user->status == 1) ?'selected':''}} selected value="1">Active</option>
                                            </select>
                                            {{-- @if ($user->status === 1)
                                                <a onclick="return confirm('Are you sure want to deactive it?')" class="badge badge-info" href="{{ route('admin.subscribe-status', ['id'=> $user->id]) }}">Active</a>
                                            @else
                                                <a onclick="return confirm('Are you sure want to active it?')" class="badge badge-warning" href="{{ route('admin.subscribe-status', ['id'=> $user->id]) }}">Pending</a>
                                            @endif --}}
                                        </td>
                                    </tr>

                                </table>
                                <button class="btn btn-primary" type="text">UPDATE</button>
                                {{-- <a href="{{ route('admin.subscribe-user.index') }}" class="btn btn-primary float-right">Back to Subscribe User</a> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script>
    $('.datepicker').datepicker({
    });
</script>
@stop
