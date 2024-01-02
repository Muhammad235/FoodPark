{{-- Include Meta Tags --}}
@include('admin.partials.__meta-tags')

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

        @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>
 

  <!-- General JS Scripts -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  {{-- <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script> --}}
  <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  {{-- <script src="{{ asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> --}}

  <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('admin/assets/js/page/upload-preview.js') }}"></script>

  
  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

  @stack('scripts')
</body>
</html>