<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/092b88e0eb.js" crossorigin="anonymous"></script>
    {{-- style --}}
    @stack('before-style')
    @include('includes.admin.style')
    @stack('after-style')
</head>

<body>
  @stack('alert')
   {{-- sidebar --}}
   @include('includes.admin.sidebar')
    <div id="right-panel" class="right-panel">

        {{-- navbar --}}
        @include('includes.admin.navbar')
         <!-- Content -->
       <div class="content">
             {{-- content --}}
             @yield('content')
       </div>
       <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    @stack('before-script')
    @include('includes.admin.script')
    @stack('after-script')
</body>
</html>
