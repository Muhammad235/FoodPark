@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Why Choose Us Section</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Item</h4>
         
        </div>
        <div class="card-body">
           <form enctype="multipart/form-data" action="{{ route('admin.why-choose-us.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Icon</label>
                <input type='text' class='form-control' placeholder='Pick Icon' name='icon' value='fas fa-percent'>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type='text' class='form-control' placeholder='Title' name='title' value='{{ old('title') }}'>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <input type='text' class='form-control' placeholder='Short Description' name='short_description' value='{{ old('short_description') }}'>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' name='status'>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection

