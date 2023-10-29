@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                </div>
                <div>Subscribe subscribeuser
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
                            <h5 class="card-title"> Detailes Of {{ $subscribeuser->fname }} {{ $subscribeuser->mname }} {{ $subscribeuser->lname }}</h5>

                            <form action="{{ route('admin.expired-user-send-mail') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <table class="table table-bordered">
                                <tr>
                                    <th>{{ $subscribeuser->fname }} {{ $subscribeuser->mname }} {{ $subscribeuser->lname }}</th>
                                    <td>
                                        @if ($subscribeuser->profile_img)
                                            <img src="{{ asset($subscribeuser->profile_img) }}" alt="" width="80">
                                        @else
                                            <img src="{{ asset('upload/subscribe-users/images.jpg') }}" alt="" width="80">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>

                                        <input name="name" class="form-control" type="text" value="{{ $subscribeuser->fname }} {{ ($subscribeuser->mname) ? $subscribeuser->mname : '' }} {{ ($subscribeuser->lname) ? $subscribeuser->lname : '' }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>phone</th>

                                    <td><input name="phone" class="form-control" type="text" value="{{ $subscribeuser->phone  }}"></td>
                                </tr>

                                <tr>
                                    <th>Email </th>
                                    <td><input name="email" class="form-control" type="text" value="{{ $subscribeuser->email  }}"></td>
                                </tr>
                                <tr>
                                    <th>Message </th>
                                    <td> <textarea name="message" class="form-control" name="message" id="" cols="30" rows="4"></textarea> </td>
                                </tr>


                            </table>
                            <button class="mt-1 btn btn-primary p-store-btn" type="submit">Submit</button>

                        </form>

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
