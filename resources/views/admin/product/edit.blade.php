@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Product</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Edit Product</h4>
         
        </div>
        <div class="card-body">
           <form enctype="multipart/form-data" action="{{ route('admin.product.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class='form-group'>
                <label>Product Thumbnail</label>
                <div id='image-preview' class='image-preview'>
                    <label for='image-upload' id='image-label'>Choose File</label>
                    <input type='file' name='image' id='image-upload' />
                </div>
            </div>

            <div class="form-group">
                <label>Product Name</label>
                <input type='text' class='form-control' placeholder='Name' name='name' value='{{ old('name') }}'>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type='number' class='form-control' placeholder='Price' name='price' value='{{ old('price') }}'>
            </div>

            <div class="form-group">
                <label>Offer Price</label>
                <input type='number' class='form-control' placeholder='offer_price' name='offer_price' value='{{ old('offer_price') }}'>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select type='text' class='form-control select2' name='category_id'>
                    <option select>select</option>   
                    @foreach ($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name}}</option>   
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Sku</label>
                <input type='text' class='form-control' placeholder='Sku' name='sku' value='{{ old('sku') }}'>
            </div>

            <div class="form-group">
                <label>Seo Title</label>
                <input type='text' class='form-control' placeholder='Seo Title' name='seo_title' value='{{ old('seo_title') }}'>
            </div>

            <div class="form-group">
                <label>Seo Description</label>
                <input type='text' class='form-control' placeholder='Seo Description' name='seo_description' value='{{ old('seo_description') }}'>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea class='form-control' placeholder='Short Description' name='short_description' >{{ old('short_description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Long Description</label>
                <textarea name='long_description' class='form-control summernote' placeholder='long Description' >{{ old('long_description') }}</textarea>
            </div>


            <div class="form-group">
                <label>Show at home</label>
                <select type='text' class='form-control' name='show_at_home'>
                    <option value="1">Yes</option>
                    <option selected value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' name='status'>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection

