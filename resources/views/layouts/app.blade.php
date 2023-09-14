<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/logo-eventplan-sm.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-eventplan-sm.png') }}" />
    <title>@yield('title')</title>

    @stack('before-style')
    @include('includes.backend.style')
    @stack('after-style')
  

    <!--  feather icon  -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
     
   @include('includes.backend.navbar')
      <div class="container-fluid page-body-wrapper">
        @include('includes.backend.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
            @include('includes.backend.footer')
        </div>
      </div>
    </div>
    @include('sweetalert::alert')
    @stack('before-script')
    @include('includes.backend.script')
    @stack('after-script')
    {{-- <h1>yeyeyey tolol</h1> --}}
  </body>
</html>
