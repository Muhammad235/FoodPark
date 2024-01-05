@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Why Choose Us</h1>
    </div>

    <div class="card">
      <div class="card-body">
        <div id="accordion">
          <div class="accordion">
            <div class="accordion-header bg-primary text-light p-3" role="button" data-toggle="collapse" data-target="#panel-body-3">
              <h4>Why Choose Us Section Titles</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
               <div class="form-group">
                  <label for="">Top Title</label>
                  <input type='text' class='form-control' placeholder='' name='' value=''>
               </div>
               <div class="form-group">
                  <label for="">Main Title</label>
                  <input type='text' class='form-control' placeholder='' name='' value=''>
               </div>
               <div class="form-group">
                  <label for="">Sub Title</label>
                  <input type='text' class='form-control' placeholder='' name='' value=''>
               </div>
               <button class="btn btn-primary">submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="card card-primary">
      <div class="card-header">
        <h4>All Items</h4>          
      </div>
      <div class="card-body">
        {{ $dataTable->table() }}
      </div>
    </div>
</section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush