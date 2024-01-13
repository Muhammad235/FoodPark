@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Why Choose Us Section</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Update Item</h4>
         
        </div>
        <div class="card-body">
           <form enctype="multipart/form-data" action="{{ route('admin.why-choose-us.update', $whyChooseUs->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Change Icon</label> <br>
               Current Icon( <i class="{{ $whyChooseUs->icon }}"></i> )  <button data-icon="{{ $whyChooseUs->icon }}"  class="btn btn-primary"  role="iconpicker" name="icon"> </button>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type='text' class='form-control' placeholder='Title' name='title' value='{{ $whyChooseUs->title }}'>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <input type='text' class='form-control' placeholder='Short Description' name='short_description' value='{{ $whyChooseUs->short_description }}'>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' name='status'>
                    <option @selected($whyChooseUs->status == 1)  value="1">Active</option>
                    <option @selected($whyChooseUs->status == 0) value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection

