@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Slider</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Slider</h4>
         
        </div>
        <div class="card-body">
           <form enctype="multipart/form-data" action="{{ route('admin.slider.store')}}" method="POST">
            @csrf
            <div class="form-group">
            <label>Image</label>
                <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="image-upload" />
                </div>
            </div>

            <div class="form-group">
                <label>Offer</label>
                <input type='text' class='form-control' placeholder='10%' name='offer' value='{{ old('offer') }}'>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type='text' class='form-control' placeholder='Title' name='title' value='{{ old('title') }}'>
            </div>

            <div class="form-group">
                <label>Sub Title</label>
                <input type='text' class='form-control' placeholder='Sub Title' name='sub_title' value='{{ old('sub_title') }}'>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea class='form-control' placeholder='Short Description' name='short_description' value='{{ old('short_description') }}'></textarea>
            </div>

            <div class="form-group">
                <label>Button Name</label>
                <input type='text' class='form-control' placeholder='Button Name' name='button_link' value='{{ old('button_link') }}'>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' name='status'>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection