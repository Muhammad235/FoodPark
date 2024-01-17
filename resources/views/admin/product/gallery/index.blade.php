@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Product Categories</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>All Images</h4>          
        </div>
        <div class="card-body">
            <div class="col-md-8">
                <form  enctype="multipart/form-data" action="{{ route('admin.product-gallery.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="text" name="product_id"  value="{{ $productId }}">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
</section>
@endsection

