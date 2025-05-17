
<!doctype html>
<html lang="en">
  <head>
       <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" />
<script
  src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js">
</script>
  </head>
  <body>
    <div class="page">
      <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
         @include('admin.layouts.sidebar')
        </div>
      </aside>
     @include('admin.layouts.header')
      <!-- END NAVBAR  -->
      <div class="page-wrapper">

      @yield('content')
        <!-- END PAGE BODY -->
        <!--  BEGIN FOOTER  -->
       @include('admin.layouts.footer')
        <!--  END FOOTER  -->
      </div>
    </div>
</body>
</html>
