@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update User</h1>
    </div>

    <div class="section-body">
        <div class="card card-primary">
            <div class="card-header">
              <h4>Update User settings</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                </div>
                  <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header">
              <h4>Update Password</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('admin.password.update')}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="current_password">
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
              </form>
            </div>
        </div>
    </div>



  </section>
@endsection