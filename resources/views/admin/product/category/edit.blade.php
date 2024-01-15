@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Category</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
          <h4>Create Category</h4>
         
        </div>
        <div class="card-body">
           <form action="{{ route('admin.category.update', $category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type='text' class='form-control' placeholder='Name' name='name' value='{{ $category->name }}'>
            </div>

            <div class="form-group">
                <label>Show at home</label>
                <select type='text' class='form-control' name="show_at_home">
                    <option @selected($category->show_at_home == 1) value="1">Yes</option>
                    <option @selected($category->show_at_home == 0) value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select type='text' class='form-control' name='status'>
                    <option @selected($category->staus == 1) value="1">Active</option>
                    <option @selected($category->staus == 0) value="0">InActive</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
      </div>
</section>
@endsection

