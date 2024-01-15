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
           <form action="{{ route('admin.category.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type='text' class='form-control' placeholder='Name' name='name' value='{{ old('name') }}'>
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

