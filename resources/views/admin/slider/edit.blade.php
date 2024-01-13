@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Slider</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Update Slider</h4>
         
        </div>
        <div class="card-body">
           <form enctype="multipart/form-data" action="{{ route('admin.slider.update', $slider->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
            <label>Image</label>
                <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="image-upload" />
                </div>
            </div>

            <div class="form-group">
                <label>Offer</label>
                <input type='text' class='form-control' placeholder='10%' name='offer' value='{{ $slider->offer }}'>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type='text' class='form-control' placeholder='' name='title' value='{{ $slider->title }}'>
            </div>

            <div class="form-group">
                <label>Sub Title</label>
                <input type='text' class='form-control'  name='sub_title' value='{{ $slider->sub_title }}'>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea class='form-control'  name='short_description'>{{ $slider->sub_title }}</textarea>
            </div>

            <div class="form-group">
                <label>Button Name</label>
                <input type='text' class='form-control'  name='button_link' value='{{ $slider->button_link }}'>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' placeholder='' name='status'>
                    <option @selected($slider->status == 1) value="1">Active</option>
                    <option @selected($slider->status == 0) value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection


@push('scripts')
<script>
  $(document).ready(function () {
      $('.image-preview').css({
          'background-image': 'url({{ $slider->image }})',
          'background-size': 'cover',
          'background-position': 'center',
      });
  });
</script>
@endpush