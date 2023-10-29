// preloader
jQuery(".pa-ellipsis").fadeOut(), jQuery(".pa-preloader").delay(500).fadeOut("500")

// Ck editor
if ($('#HCKEditor_limit').length > 0) {
    CKEDITOR.replace('HCKEditor_limit');
}
if($('#HCKEditor').length > 0){
    CKEDITOR.replace( 'HCKEditor' );
}

if($('#HCKEditor2').length > 0){
    CKEDITOR.replace( 'HCKEditor2' );
}
if($('#HCKEditor3').length > 0){
    CKEDITOR.replace( 'HCKEditor3' );
}
if($('#HCKEditor4').length > 0){
    CKEDITOR.replace( 'HCKEditor4' );
}

if($('#benifitHCKEditor').length > 0){
    CKEDITOR.replace( 'benifitHCKEditor' );
}



// CakEditor script
CKEDITOR.replace('editor1', {
    extraPlugins: 'embed,autoembed,image2',
    height: 250,

    // Load the default contents.css file plus customizations for this sample.
    contentsCss: [
    'http://cdn.ckeditor.com/4.16.2/full-all/contents.css',
    'https://ckeditor.com/docs/ckeditor4/4.16.2/examples/assets/css/widgetstyles.css'
    ],
    // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
    embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

    image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
    image2_disableResizer: true,
    removeButtons: 'PasteFromWord'
});

    
CKEDITOR.replace('editor2', {
    extraPlugins: 'embed,autoembed,image2',
    height: 250,

    // Load the default contents.css file plus customizations for this sample.
    contentsCss: [
    'http://cdn.ckeditor.com/4.16.2/full-all/contents.css',
    'https://ckeditor.com/docs/ckeditor4/4.16.2/examples/assets/css/widgetstyles.css'
    ],
    // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
    embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

    image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
    image2_disableResizer: true,
    removeButtons: 'PasteFromWord'
});




// $('.photoGallery').DataTable({
//     "bDestroy": true,
//     "lengthMenu": [[20, 30, 50, -1], [20, 30, 50, 100]],
// } );


//Remove Select Box Duplicates
var seen = {};
$('#commonSelect option').each(function() {
    var txt = $(this).val();
    if (seen[txt]){
        $(this).remove();
    }else{
        seen[txt] = true;
    }
});

// Data Delete Btn Sweet Alert (Delete Method)
$('.data-delete-btn').on('click', function(e){
    e.preventDefault();
    swal({
        title: "Careful!",
        text: "Are you sure?",
        icon: "warning",
        dangerMode: true,
        buttons: {
          cancel: "Exit",
          confirm: "Confirm",
        },
    })
    .then ((willDelete) => {
        if (willDelete) {
           $(this).closest("form").submit();
        }
    });
});


// Data Delete Btn Sweet Alert (Get Method)
$('.data-delete-btn-label').on('click', function(e){
    e.preventDefault();
    swal({
        title: "Careful!",
        text: "Are you sure?",
        icon: "warning",
        dangerMode: true,
        buttons: {
          cancel: "Cancel",
          confirm: "Confirm",
        },
    })
    .then ((willDelete) => {
        if (willDelete) {
           $(this).parent('.cart-item-remove-btn')[0].click();
        }
    });
});

// Sidebar Collapse Show Hide On Url Request Basis
$('.vertical-nav-menu li a.mm-active').closest('.sm-link').addClass('mm-active');

$(document).ready( function ($) {
    $('.actions .action-icon').click(function(e) {
        e.preventDefault();
        var thisDropdown = $(this).closest('.actions').find('ul');
        $('.actions ul').not(thisDropdown).hide();
        thisDropdown.slideToggle('fast');
    });
} );

// $(document).ready( function () {
//     $('#table_id').DataTable();
// } );
$('#table_id').DataTable( {
    "order": [[ 0, "asc" ]]
} );

// Sidebar Collapse Show Hide On Url Request Basis
$('.vertical-nav-menu li a.mm-active').closest('.sm-link').addClass('mm-active');

// Custom Modal
$('.add-new-modal-btn').click(function(e){
    e.preventDefault();
	$('.add-new-modal-wrapper').addClass('modal-visible');
	$('.fixed-sidebar .app-main .app-main__outer').css('z-index','11');
	$('.fixed-header .app-header').css('z-index','-1');
	$('.ui-theme-settings .btn-open-options').css('opacity','0');
	$('body').css('overflow','hidden')
});
$('.modal-hide-btn').click(function(){
	$('.add-new-modal-wrapper').removeClass('modal-visible');
	$('.fixed-sidebar .app-main .app-main__outer').removeAttr('style');
	$('.fixed-header .app-header').removeAttr('style');
	$('.ui-theme-settings .btn-open-options').removeAttr('style');
	$('body').removeAttr('style');
	$("form")[0].reset();
});

// Product Multiple Picture Upload with Default Check
$(document).on('click','.p-image-item-remove-btn', function(){
    $(this).closest('.product-cover-photo').remove();
});
$(document).on('click','.p-image-new-item-add-btn', function(){
    $(this).closest('.product-cover-photo-items-wrapper').append('<div class="product-cover-photo">\
        <input class="p-cover-photo" type="file" accept="image/*" name="post_image[]">\
        <div class="check-wrapper">\
            <input class="product-cover-default-checkbox" type="checkbox" name="default_image[]" checked value="0">\
            <div class="box"></div>\
            <label>Make As Default</label>\
        </div>\
        <div class="p-image-item-remove-btn"><i class="fas fa-times"></i></div>\
    </div>');
});

// Uncheck other chekbox if checked in one
$('.product-cover-photo .check-wrapper .box').css('opacity','0');
$('.product-cover-photo .check-wrapper').find('.product-cover-default-checkbox').val(1)
$(document).on('click', '.product-cover-photo .check-wrapper .box', function(){
    $(this).closest('.product-cover-photo-items-wrapper').find('.check-wrapper .box').each(function(){
        $(this).css('opacity','1');
    });
    $(this).css('opacity','0');

    $(this).closest('.product-cover-photo-items-wrapper').find('.product-cover-default-checkbox').each(function(){
        $(this).val(0);
    });
    $(this).closest('.check-wrapper').find('.product-cover-default-checkbox').val(1);
});


// Multiple Video Embed link
$(document).on('click','.p-video-item-remove-btn', function(){
    $(this).closest('.product-cover-photo').remove();
});
$(document).on('click','.p-video-new-item-add-btn', function(){
    $(this).closest('.product-video-items-wrapper').append('<div class="product-cover-photo">\
        <input class="form-control p-cover-photo" type="text" name="video_url[]" required>\
        <div class="p-video-item-remove-btn"><i class="fas fa-times"></i></div>\
    </div>');
});

$(document).on('click', '.p-store-btn', function(){
    $('.p-cover-photo').each(function(){
        if((this).val() < 0){
            $(this).closest('.product-cover-photo').remove();
        }
    });
});

// Remove Last Character From String From All Posts table
setTimeout(function(){
    $('td.post-category span:last-child').each(function(){
        var lastStringEle = $(this);
        lastStringSliced = lastStringEle.text().slice(0, -1);
        lastStringEle.text(lastStringSliced)
    });
},100);

$(".copy_clip_board .copy-input-btn").click(function () {
    //var copyText = document.getElementById("copyInput");
    var copyText = $(this).closest(".item").find(".copy-input")[0];
    console.log(copyText);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");

    var tooltip = $(this).closest(".item").find(".my-tooltip")[0];
    tooltip.innerHTML = "Copied: " + copyText.value;
});

$(".copy-input-btn").on({
    mouseenter: function () {
        $(this).closest("td").find(".my-tooltip").text("Copy to clipboard");
    },
    mouseleave: function () {
        $(this).closest("td").find(".my-tooltip").text("");
    },
});


$("#commonSelect").select2({
    placeholder: "This is my placeholder",
    allowClear: true,
});

$("#exampleSelect").select2({
    placeholder: "This is my placeholder",
    allowClear: true,
});



// var maxLength = 20;
// $("#HCKEditor_limit").keyup(function () {
//     alert("hi");
//     var textlen = maxLength - $(this).val().length;
//     $(this).text(textlen);
// });