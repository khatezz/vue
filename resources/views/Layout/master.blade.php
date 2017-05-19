<!DOCTYPE html>
<html>
<head>
	<title>Internal Project</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link href="/assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="/assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendors/bower_components/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="/assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="/assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="/assets/vendors/bower_components/chosen/chosen.css" rel="stylesheet">


    <!-- CSS -->
    <link href="/assets/css/app_1.min.css" rel="stylesheet">
    <link href="/assets/css/app_2.min.css" rel="stylesheet">


</head>
<body>

@yield('content')

<script src="/assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>






<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
    <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->

<script src="/assets/js/app.min.js"></script>
<script src="/js/app.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>