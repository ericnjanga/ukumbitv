<!Doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="description" content="">

    
		

		<!-- favicons --> 
		<!-- favicons --> 
		<link rel="apple-touch-icon" sizes="57x57" href="{{asset('streamtube/images/favicons/apple-icon-57x57.png')}}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{asset('streamtube/images/favicons/apple-icon-60x60.png')}}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{asset('streamtube/images/favicons/apple-icon-72x72.png')}}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset('streamtube/images/favicons/apple-icon-76x76.png')}}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{asset('streamtube/images/favicons/apple-icon-114x114.png')}}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{asset('streamtube/images/favicons/apple-icon-120x120.png')}}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{asset('streamtube/images/favicons/apple-icon-144x144.png')}}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{asset('streamtube/images/favicons/apple-icon-152x152.png')}}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{asset('streamtube/images/favicons/apple-icon-180x180.png')}}">
		<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('streamtube/images/favicons/android-icon-192x192.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('streamtube/images/favicons/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{asset('streamtube/images/favicons/favicon-96x96.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('streamtube/images/favicons/favicon-16x16.png')}}">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{{asset('streamtube/images/favicons/ms-icon-144x144.png')}}">
		<meta name="theme-color" content="#ffffff">
		<!-- favicons -->
		<!-- favicons --> 

    <link rel="stylesheet" href="{{ asset('admin-css/bootstrap/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-css/plugins/datatables/dataTables.bootstrap.css')}}">

    @yield('mid-styles')

    <link rel="stylesheet" href="{{ asset('admin-css/plugins/select2/select2.min.css')}}">

      <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-css/dist/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-css/dist/css/skins/_all-skins.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin-css/dist/css/custom.css')}}">

    @yield('styles')

</head>


<body class="hold-transition skin-blue fixed sidebar-mini">

    <div class="wrapper">

        @include('layouts.moderator.header')

        @include('layouts.moderator.nav')

        <div class="content-wrapper">

            <section class="content-header">
                <h1>@yield('content-header')<small>@yield('content-sub-header')</small></h1>
                <ol class="breadcrumb">@yield('breadcrumb')</ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>

        </div>

        <!-- include('layouts.admin.footer') -->

        <!-- include('layouts.admin.left-side-bar') -->

    </div>


    <!-- jQuery 2.2.0 -->
    <script src="{{asset('admin-css/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('admin-css/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{asset('admin-css/plugins/select2/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('admin-css/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

    <!-- SlimScroll -->
    <script src="{{asset('admin-css/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin-css/plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-css/dist/js/app.min.js')}}"></script>
      
    <script src="{{asset('admin-css/dist/js/demo.js')}}"></script>

    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    @yield('scripts')

    <script type="text/javascript">
        $("#{{$page}}").addClass("active");
        @if($sub_page) $("#{{$sub_page}}").addClass("active"); @endif
    </script>

    <script type="text/javascript">
        
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd:mm:yyyy", {"placeholder": "hh:mm:ss"});
            //Datemask2 mm/dd/yyyy
            // $("#datemask2").inputmask("hh:mm:ss", {"placeholder": "hh:mm:ss"});
            //Money Euro
            $("[data-mask]").inputmask();
        });
    </script>

</body>

</html>
