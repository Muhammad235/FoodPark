@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Product Gallery  ({{ $product->name }})</h1>
    </div>
    <div>
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary mb-3">Go Back</a>
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
                        <input type="text" name="product_id" hidden value="{{ $product->id }}">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="card card-primary">
        <div class="card-body">
            <table class="table boarded">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @unless (count($productGalleries) == 0)
                        @foreach ($productGalleries as $productGallery)
                            <tr class="mb-2">
                                <td><img width="150px" src="{{ asset($productGallery->image) }}" alt="{{ asset($productGallery->image) }}"></td>
                                <td>
                                    {{-- <a href="{{ route('admin.product-gallery.edit', $query->id) }}" class='btn btn-primary'><i class='fas fa-edit'></i></a> --}}
                                    <a href="{{ route('admin.product-gallery.destroy', $productGallery->id) }}" class='btn btn-danger mx-2 delete-item'><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr><td colspan="2" class="text-center">No data found</td></tr>
                    @endunless
                </tbody>
            </table>
        </div>
      </div>
</section>
@endsection

