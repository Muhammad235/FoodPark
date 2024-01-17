@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Product</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Update Product</h4>
         
        </div>
        <div class="card-body">
           <form enctype="multipart/form-data" action="{{ route('admin.product.update', $product->id)}}" method="POST">
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
                <input type='text' class='form-control' placeholder='Name' name='name' value='{{ $product->name }}'>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type='number' class='form-control' placeholder='Price' name='price' value='{{ $product->price }}'>
            </div>

            <div class="form-group">
                <label>Offer Price</label>
                <input type='number' class='form-control' placeholder='offer_price' name='offer_price' value='{{ $product->offer_price }}'>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select type='text' class='form-control select2' name='category_id'>
                    <option select>select</option>   
                    @foreach ($categories as $category)
                        <option @selected($product->category_id === $category->id) value='{{ $category->id }}'>{{ $category->name}}</option>   
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Sku</label>
                <input type='text' class='form-control' placeholder='Sku' name='sku' value='{{ $product->sku }}'>
            </div>

            <div class="form-group">
                <label>Seo Title</label>
                <input type='text' class='form-control' placeholder='Seo Title' name='seo_title' value='{{ $product->seo_title }}'>
            </div>

            <div class="form-group">
                <label>Seo Description</label>
                <input type='text' class='form-control' placeholder='Seo Description' name='seo_description' value='{{ $product->seo_description }}'>
            </div>

            <div class="form-group">
                <label>Short Description</label>
                <textarea class='form-control' placeholder='Short Description' name='short_description' >{!! $product->short_description !!}</textarea>
            </div>

            <div class="form-group">
                <label>Long Description</label>
                <textarea name='long_description' class='form-control summernote' placeholder='long Description' >{!! $product->long_description !!}</textarea>
            </div>


            <div class="form-group">
                <label>Show at home</label>
                <select type='text' class='form-control' name='show_at_home'>
                    <option @selected($product->status == 1)  value="1">Yes</option>
                    <option @selected($product->status == 0)  value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' name='status'>
                    <option @selected($product->status == 1) value="1">Active</option>
                    <option @selected($product->status == 0)  value="0">InActive</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection

