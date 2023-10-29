{{-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> --}}

<script type="text/javascript" src="{{ asset('assets/admin/scripts/main.js/') }}"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js "></script>

<!-- SummerNote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


<script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/toastr/js/toastr.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/admin/scripts/custom.js/') }}"></script>
<script type="text/javascript">
    // toastr script
    @if (Session::has('message'))
        toastr.success('{{Session::get('message')}}');
    @elseif(Session::has('error'))
        toastr.error('{{Session::get('error')}}');

    @elseif($errors)
        @foreach ($errors->all() as $error)
        toastr.error('{{$error}}');
        @endforeach
    @endif
</script>


<script>
    $(document).ready(function() {


        $(".select2").select2({
            allowClear: true
        });

        // Summernote Active
        $('.summernote').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null,
            focus: true,
            callbacks: {
                // onImageUpload: function(files) {
                //     uploadFile(files[0]);
                // },

                onMediaDelete : function(target) {
                    deleteFile(target[0].src);
                }
            }
        });

        // Summernote Editor Image Upload
        // function uploadSNImage(image, editor) {
        //     var data = new FormData();
        //     data.append("image", image);
        //     $.ajax({
        //         url: 'YOUR UPLOAD SCRIPT',
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         data: data,
        //         type: "post",
        //         success: function(url) {
        //             var image = $('<img>').attr('src', url);
        //             editor.summernote("insertNode", image[0]);
        //         },
        //         error: function(data) {
        //         }
        //     });
        // }

        // Summernote existing image delete
        function deleteFile(src) {
            $.ajax({
                data: {src : src},
                type: "GET",
                url: "{{ route('admin.delete-editor-existing-image') }}", // replace with your url
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }



        // Photo Gallery Search
        var photoSearch = function( data ) {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.photo-gallery-image-serach') }}",
                data: { keyword: data },
                beforeSend : function() { 
                    $(".loading").fadeIn('slow');
                },
                success: function(data) {
                    console.log(data);                 

                    if( data.length == 0 ) {
                        $('.loading').text('No more posts');
                        return;
                    } else {
                        //$(".loading").fadeOut('slow');
                        $(".search-appear").fadeIn(500).html(data);
                        
                        $('#grid').masonry({
                            itemSelector: '.item',
                            percentPosition: true,
                            columnWidth: 196.5,
                            gutter: 4,
                        });
                    }                    
                }
            });
        }

        $(document).ready(function(){
  
            // var photoSearch = function( val ){
            //     $('.search-appear').text(val);
            // }
            
            $('#search').bind('keyup click  paste', function(e){
                e.preventDefault();
                if(this.value.length >= 0 && $.trim(this.value)){
                    photoSearch(this.value);
                }
            });



        });

        

        var maxField = 20; //Input fields increment limitation
        var addButton = $('.add_benifit_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="remove_attr mt-4"><label for="benifit_content" class="">Benifit Content <a href="javascript:void(0);" class="remove_benifit_button btn btn-danger btn-sm"> Remove Benifit </a></label><textarea name="benifit_content[]" name="eventLocation" id="benifit_content" class="form-control" cols="10" rows="4"></textarea></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_benifit_button', function(e) {
            e.preventDefault();
			if(confirm('Are you sure want to delete this?')){

				// var dataId = $(this).parent('div').attr('data-id');
				// if ($.trim(dataId) !='') {
				// 	removeThis(dataId);
				// }

				$(this).closest('div.remove_attr').remove(); //Remove field html
				x--; //Decrement field counter
			}
        });

        // function removeThis(dataId){
        //     $.ajax({
        //         type: "GET",
        //         url: "",
        //         data:{dataId:dataId},
        //         cache: false,
        //         success: function (response) {
        //             $(".delNotice").html(response).fadeOut(2000);
        //         },
        //         error: function (error) {
        //             console.log(error);
        //         }
        //     });
        // }




    });
</script>
