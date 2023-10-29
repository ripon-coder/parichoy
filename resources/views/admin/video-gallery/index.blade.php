@extends('layouts.admin')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Video Gallery Video List
                    </div>
                    <button type="button" class="btn btn-primary float-right add-new-modal-btn">Add New Video</button>
                </div>
            </div>
        </div>

        @if ($video_gallery_data->count() > 0)
            <div class="video-gallery-wrap" id="post-data">
                {{-- @foreach ($video_gallery_data as $video)
                    <div class="single-video" data-id="{{ $video->id }}" id="{{ $video->id }}">
                        <div class="tooltip custom">
                            <button class="copy-input-btn">
                                <span class="tooltiptext my-tooltip">Edit Image</span>
                                <a href="{{ route('admin.video-gallery-edit', $video->id) }}"><i class="fas fa-edit"></i></a>
                            </button>
                        </div>

                        <span class="close" data-toggle="tooltip" data-placement="top" title="Delete Image">X</span>

                        <iframe src="https://www.youtube.com/embed/{{ $video->video_url }}"></iframe>
                    </div>
                @endforeach --}}
                @include('admin.video-gallery.load-more-video')
            </div>

            {{-- <div class="gallery-paginate d-flex justify-content-center pt-4 pb-4">{!! $video_gallery_data->links() !!}</div> --}}

            <div class="ajax-load d-flex justify-content-center pt-4 pb-4 ">
                <img class="d-none" src="{{ asset('/') }}assets/admin/images/loader.png" alt="" width="100">
            </div>
            @else
            <h3 style="text-alig:center"> No Post Found</h3>
        @endif
    </div>

    <!-- Add New Category Form Modal -->
    <div class="add-new-modal-wrapper">
        <div class="add-new-modal-inner">
            <div class="main-card card">
                <div class="card-body">
                    <div class="card-top-wrapper">
                        <h5 class="card-title">Upload New Video(s)</h5>
                        <div class="modal-hide-btn"><i class="fas fa-times"></i></div>
                    </div>
                    <form action="{{ route('admin.video-gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group border-0">
                            <img src="{{ asset('/') }}assets/admin/images/video-id.png" alt=""><br>
                            <label class="mb-0">Video ID</label>
                            <div class="avatar-upload top-photo">
                                <div class="product-video-items-wrapper">
                                    <div class="product-cover-photo">
                                        <input class="form-control p-cover-photo" type="text"  name="video_url[]" required>
                                        <div class="p-video-new-item-add-btn"><i class="fas fa-plus"></i>Add New</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="mt-1 btn btn-primary p-store-btn" type="submit">Submit</button>
                        <button class="mt-1 btn modal-hide-btn cancel" type="reset">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>

        $(document).ready(function() {    
                        // Gallery image delete
            $('.single-video .close').click(function(e){
                e.preventDefault();

                var dataId = $(this).closest('.single-video').data('id');
                removeGalleryImage(dataId);
                // $(this).closest('.item').remove();
            });


            function removeGalleryImage(videiId){

                swal({
                    title: "Careful!",
                    text: "Are you sure want to delete it?",
                    icon: "warning",
                    dangerMode: true,
                    buttons: {
                        cancel: "Exit",
                        confirm: "Delete",
                    },
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('admin.video-gallery.destroy') }}",
                            data: {videiId:videiId},
                            cache: false,
                            success: function (response) {
                                // swal("Success! Your image has been deleted!", {
                                //     icon: "success",
                                // });
                                console.log("Success! Your video has been deleted!!");
                                
                            $("#" + videiId +"").remove(); //remove the tr without refreshing
                            },
                            error: function(error){
                                console.log(error);
                            }
                        });
                    }else{
                        console.log('Video not deleted !!');
                    }
                });
            
            }

        });
    </script>


    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page){
            $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data) {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
        }
</script>
@stop
