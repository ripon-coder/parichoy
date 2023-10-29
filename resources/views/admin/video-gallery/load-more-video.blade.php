@foreach ($video_gallery_data as $video)
    <div class="single-video" data-id="{{ $video->id }}" id="{{ $video->id }}">
        <div class="tooltip custom">
            <button class="copy-input-btn">
                <span class="tooltiptext my-tooltip">Edit Video</span>
                <a href="{{ route('admin.video-gallery-edit', $video->id) }}"><i class="fas fa-edit"></i></a>
            </button>
        </div>

        <span class="close" data-toggle="tooltip" data-placement="top" title="Delete Video">X</span>

        <iframe src="https://www.youtube.com/embed/{{ $video->video_url }}"></iframe>
    </div>
@endforeach
