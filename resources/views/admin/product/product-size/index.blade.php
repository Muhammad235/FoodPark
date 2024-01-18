@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Sizes  ({{ $product->name }})</h1>
    </div>
    <div>
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary mb-3">Go Back</a>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Add Product Size</h4>          
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form  enctype="multipart/form-data" action="{{ route('admin.product-size.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="product_id" hidden value='{{ $product->id }}'>
        
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="">Price</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @unless (count($sizes) == 0)
                        @foreach ($sizes as $size)
                            <tr class="mb-2">
                                <td>{{ $size->name }}</td>
                                <td>{{ $size->price }}</td>
                                <td>
                                    <a href="{{ route('admin.product-size.destroy', $size->id) }}" class='btn btn-danger mx-2 delete-item'><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr><td colspan="3" class="text-center">No data found</td></tr>
                    @endunless
                </tbody>
            </table>
        </div>
      </div>
</section>
@endsection

