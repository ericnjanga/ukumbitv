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

    <link rel="stylesheet" href="{{ asset('admin-css/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-css/plugins/datatables/dataTables.bootstrap.css')}}">

    @yield('mid-styles')

    <link rel="stylesheet" href="{{ asset('admin-css/plugins/select2/select2.min.css')}}">

      <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-css/dist/css/AdminLTE.css') }}">

    <link rel="stylesheet" href="{{ asset('admin-css/dist/css/skins/_all-skins.css')}}">

    <link rel="stylesheet" href="{{ asset('admin-css/dist/css/custom.css')}}">

    @yield('styles')

</head>


<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        @include('layouts.admin.header')

        @include('layouts.admin.nav')

        <div class="content-wrapper content-wrapper-admin">

            <section class="content-header">
                <h1>@yield('content-header')<small>@yield('content-sub-header')</small></h1>
                <ol class="breadcrumb">@yield('breadcrumb')</ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')

							<style>
								.quick-controls {
									display: flex;
									position: fixed;
							    bottom: 50px;
							    right: 40px;
							        width: 110px;
								}
								.quick-controls .btn {
									border-radius: 50px;
									width: 50px;
							    height: 50px;
							    font-size: 1.5em;
							    border: 0;
							    /* */
							    display: flex;
							    align-items: center;
							    justify-content: center;
							    flex: 1;
							    /** **/
							    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.75);
									-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.75);
									box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.75);
								}
								 
								.btn-edit {
									margin-left: 10px;
								}
								    
							</style>
              <div class="quick-controls">
              	<a id="btn-qc-add" href="#" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Create a new record">
              		<i class="fa fa-plus" aria-hidden="true"></i>
              	</a>
              	<a id="btn-qc-view" href="#" class="btn btn-edit btn-default" data-toggle="tooltip" data-placement="top" title="View records list">
									<i class="fa fa-eye" aria-hidden="true"></i>
              	</a>
              </div>
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

    <!-- jvectormap -->
    <script src="{{asset('admin-css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <script src="{{asset('admin-css/plugins/chartjs/Chart.min.js')}}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{asset('admin-css/dist/js/pages/dashboard2.js')}}"></script> -->

    <script src="{{asset('admin-css/dist/js/demo.js')}}"></script>

    <!-- page script -->
    <script>
        $(function () {
            $('#table-actorsview').DataTable({
						  "columns": [ 
						    null,
						    null,
						    { "width": "50%" },
						    { "width": "10%" }
						  ]
						} );
            $('#table-categoriesview, #table-langsview').DataTable({
						  "columns": [ 
						    null,
						    null, 
						    { "width": "10%" }
						  ]
						} ); 
            $('#table-directorsview').DataTable({
						  "columns": [ 
						    null,
						    null, 
						    null, 
						    { "width": "20%" }
						  ]
						} );
            $('#table-prodagentview').DataTable({
						  "columns": [ 
						    null,
						    null, 
						    null,
						    null, 
						    { "width": "10%" }
						  ]
						} );
            $('#table-payplansview').DataTable({
                "columns": [
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    { "width": "10%" }
                ]
            } );


      //       $("#example1").DataTable();
      //       $('#example2').DataTable({
      //           "paging": true,
      //           "lengthChange": false,
      //           "searching": false,
      //           "ordering": true,
      //           "info": true,
      //           "autoWidth": false
      //       });

          //Assign "view" and "add" button urls based on the page
          //......................................................
          //......................................................
          var page_url = document.location.href,
          		$btn_qc1 = $('#btn-qc-add');
          		$btn_qc2 = $('#btn-qc-view');
  
					if (page_url.indexOf('user') > -1 || page_url.indexOf('users') > -1){
          	var $menu_item = $('#sidebar-menu > #users'); 
          }
          else if (page_url.indexOf('category') > -1 || page_url.indexOf('categories') > -1){
          	var $menu_item = $('#sidebar-menu > #categories'); 
          }
          else if(page_url.indexOf('actor') > -1 || page_url.indexOf('actors') > -1){
          	var $menu_item = $('#sidebar-menu > #actors'); 
          }
          else if(page_url.indexOf('director') > -1 || page_url.indexOf('directors') > -1){
          	var $menu_item = $('#sidebar-menu > #directors'); 
          	console.log('>>>>$menu_item=', $menu_item);
          }
          else if(page_url.indexOf('lang') > -1 || page_url.indexOf('langs') > -1){
          	var $menu_item = $('#sidebar-menu > #langs'); 
          }
          //For movies (exclude movie producers)
          else if((page_url.indexOf('movie') > -1 || page_url.indexOf('videos') > -1) && page_url.indexOf('movie-producer') == -1){
          	var $menu_item = $('#sidebar-menu > #videos'); 
          }
          else if(page_url.indexOf('producer-agent') > -1 || page_url.indexOf('producer-agents') > -1){
          	var $menu_item = $('#sidebar-menu > #producer_agents'); 
          }
          else if (page_url.indexOf('movie-producer') > -1 || page_url.indexOf('movie-producers') > -1){
          	var $menu_item = $('#sidebar-menu > #movie_producers'); 
          }
          else if (page_url.indexOf('payment-plan') > -1 || page_url.indexOf('payment-plans') > -1){
            var $menu_item = $('#sidebar-menu > #payment_plans');
          }

          //Assig link values
          if($menu_item!==undefined && $menu_item.length > 0){ 
          	$btn_qc1.attr('href', $menu_item.data('btn-add'));
          	$btn_qc2.attr('href', $menu_item.data('btn-view'));
          } 
        }); 
    </script>

    @yield('scripts')

    <script type="text/javascript">
        $("#{{$page}}").addClass("active");
        @if(isset($sub_page)) $("#{{$sub_page}}").addClass("active"); @endif
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



        //Initalize tooltips
        $(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				});
    </script>


</body>

</html>
