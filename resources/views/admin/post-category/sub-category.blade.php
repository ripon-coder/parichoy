@php $dash.='-- '; @endphp
@foreach($subcategories as $subcategory)

    @if(isset($category_data->id) && $category_data->id != $subcategory->id )
        <option class="subcategory" {{ ($category_data->category_id == $subcategory->id ) ? 'selected' : '' }} value="{{$subcategory->id}}">{{ $dash }}{{$subcategory->title}}</option>
    @endif

    @if(count( $subcategory->subCategories ))
        @include('admin.post-category.sub-category' ,['subcategories' => $subcategory->subCategories])
    @endif
@endforeach