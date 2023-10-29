@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/lightbox.min.css/') }} ">
@endsection

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Photo Gallery Image List
                    </div>
                    <button type="button" class="btn btn-primary float-right add-new-modal-btn">Add New Photo</button>
                </div>
            </div>
        </div>


            <div class="photo_search photo_search mb-4 text-right">
                <form action="">
                    <input id="search" type="search" placeholder="Search Your Photo">
                </form>
                <div class="loading"></div>
            </div>
            <div class="search-appear">
                @if($photo_gallery_data->count() > 0)
                    <div class="infinite-scroll" id="grid">

                        @foreach ($photo_gallery_data as $image)
                            <div class="item" data-id="{{ $image->id }}" id="{{ $image->id }}">
                                @if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on')
                                    <input type="text" name="" value="{{ 'http://'.$_SERVER['HTTP_HOST'].'/'.$image->image_url }}" class="copy-input" id="copyInput" readonly>
                                @elseif(!isset($_SERVER['HTTP']) || $_SERVER['HTTP'] != 'on')
                                    <input type="text" name="" value="{{ 'https://'.$_SERVER['HTTP_HOST'].'/'.$image->image_url }}" class="copy-input" id="copyInput" readonly>
                                @endif

                                <div class="tooltip custom">
                                    <button class="copy-input-btn">
                                        <span class="tooltiptext">Edit Image</span>
                                        <a href="{{ route('admin.photo-gallery.edit', $image->id) }}"><i class="fas fa-edit"></i></a>
                                    </button>
                                </div>

                                <div class="tooltip copy_clip_board">
                                    <button class="copy-input-btn">
                                        <span class="tooltiptext my-tooltip">Copy to clipboard</span>
                                        <i class="fas fa-clipboard-list"></i>
                                    </button>
                                </div>

                                <span class="close" data-toggle="tooltip" data-placement="top" title="Delete Image">X</span>

                                {{-- <img class="media-object" width="64" src="{{asset($image->image_url)}}" width="100"> --}}

                                <a class="title-wrap" href="{{asset($image->image_url)}}" data-lightbox="image-1" data-title="{{ $image->title }}">
                                    <img class="media-object" width="64" src="{{asset($image->image_url)}}" width="100">
                                    <h4 class="photo-title">{{ $image->title }}</h4>
                                </a>
                                
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="gallery-paginate d-flex justify-content-center pt-4 pb-4">{!! $photo_gallery_data->links() !!}</div> --}}
                @else
                    <h3 style="text-alig:center"> No Post Found</h3>
                @endif
            </div>
    </div>

    <!-- Add New Category Form Modal -->
    <div class="add-new-modal-wrapper">
        <div class="add-new-modal-inner">
            <div class="main-card card">
                <div class="card-body">
                    <div class="card-top-wrapper">
                        <h5 class="card-title">Upload New Image(s)</h5>
                        <div class="modal-hide-btn"><i class="fas fa-times"></i></div>
                    </div>
                    <form action="{{ route('admin.photo-gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative form-group">
                            <label class="">Title</label><br>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Images(Multiple)</label><br>
                            <small>Press Ctrl Key For Multi Select</small>
                            <input type="file" name="image_url[]" class="form-control" required multiple>
                        </div>
                        <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                        <button class="mt-1 btn modal-hide-btn cancel" type="reset">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="{{ asset('assets/admin/scripts/jquery.jscroll.min.js/') }}"></script>
<script src="{{ asset('assets/admin/scripts/lightbox.min.js/') }}"></script>

<script>

    $(document).ready(function() {

        // $('.masonry').masonry();
    

        $('#grid').masonry({
            itemSelector: '.item',
            percentPosition: true,
            columnWidth: 196.5,
            gutter: 4,
        });

        // Gallery image delete
        $('.item .close').click(function(e){
            e.preventDefault();

            var dataId = $(this).closest('.item').data('id');
            removeGalleryImage(dataId);
            // $(this).closest('.item').remove();
        });


        function removeGalleryImage(galleryId){

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
                        url: "{{ route('admin.delete.gallery.image') }}",
                        data: {galleryId:galleryId},
                        cache: false,
                        success: function (response) {
                            // swal("Success! Your image has been deleted!", {
                            //     icon: "success",
                            // });
                            console.log("Success! Your image has been deleted!!");
                            
                           $("#" + galleryId +"").remove(); //remove the tr without refreshing
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }else{
                    // swal({
                    //     text: "Error: Image not deleted!!",
                    //     icon: "warning",
                    //     dangerMode: true,
                    // });

                    console.log('Image not deleted !!');
                }
            });
           
        }

        // Lightbox Activition
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })

        // $('ul.pagination').hide();
        // $(function() {
        //     $('.infinite-scroll').jscroll({
        //         autoTrigger: true,
        //         loadingHtml: '<img class="center-block" src="{{ asset("/") }}/assets/admin/images/loader.png" alt="Loading..." width="82"/>',
        //         padding: 0,
        //         nextSelector: '.pagination li.active + li a',
        //         contentSelector: 'div.infinite-scroll',
        //         callback: function() {
        //             $('ul.pagination').remove();
        //         }
        //     });
        // });





    });


</script>
@stop