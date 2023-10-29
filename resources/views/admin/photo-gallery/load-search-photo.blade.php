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