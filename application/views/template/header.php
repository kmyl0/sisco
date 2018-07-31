<!DOCUMENT html>
<html lang="es" ng-app="sis">
<head>
	<!-- Metadata -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- HOJAS DE ESTILO HOJAS DE ESTILO HOJAS DE ESTILO HOJAS DE ESTILO HOJAS DE ESTILO HOJAS DE ESTILO HOJAS DE ESTILO -->
	<!-- Latest compiled and minified CSS ONLINE-->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
	<!-- Latest compiled and minified CSS OFFLINE-->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css"/>

	<!-- Custom CSS -->
    <link href="<?= base_url()?>assets/css/theme/startmin.css" rel="stylesheet">

	<!-- Optional theme ONLINE-->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"/> -->
	<!-- Optional theme OFFLINE-->
	<!-- <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-theme.css"/> -->

	<!-- Bootstrap Validator theme ONLINE-->
	<!-- <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"/> -->
	<!-- Bootstrap Validator theme OFFLINE-->
	<link href="<?= base_url()?>assets/css/bootstrapValidator.min.css" rel="stylesheet"/>

	<!-- Bootstrap DateTimePicker ONLINE -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.css" rel="stylesheet"> -->
	<!-- Bootstrap DateTimePicker OFFLINE -->
	<link href="<?= base_url()?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<!-- Jquery UI Theme -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/jquery-ui.css">

	<!-- JQUERY Datatables ONLINE-->
	<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> -->
	<!-- JQUERY Datatables OFFLINE-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/jquery.dataTables.min.css">

	<!-- MetisMenu CSS -->
    <link href="<?= base_url()?>assets/css/theme/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?= base_url()?>assets/css/theme/timeline.css" rel="stylesheet">    

    <!-- Morris Charts CSS -->
    <link href="<?= base_url()?>assets/css/theme/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
    <link href="<?= base_url()?>assets/css/theme/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- MultiSelect -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/multiple-select.css">


	<!-- SCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTSSCRIPTS  -->

	<!-- Jquery 3.1.1 ONLINE-->
	<!-- <script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script> -->

	<!-- Jquery 2.1.3 ONLINE-->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
	<!-- Jquery 2.1.3 OFFLINE -->
	<script src="<?= base_url()?>assets/js/jquery.min.js"></script>

	<!-- JQUERY UI ONLINE-->
	<!-- <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script> -->
	<!-- JQUERY UI OFFLINE-->
	<script src="<?= base_url()?>assets/js/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>

	<!-- MomentJs OFFLINE -->
	<script src="<?= base_url()?>assets/js/moment.js"></script>	
	
	<!-- Latest compiled and minified JavaScript for Bootstrap ONLINE-->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<!-- Latest compiled and minified JavaScript for Bootstrap OFFLINE-->
	<script src="<?= base_url()?>assets	/js/bootstrap.min.js"></script>	
	
	<!-- Latest compiled and minified JavaScript for BootstrapValidator ONLINE-->
	<!-- <script src="http://oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script> -->
	<!-- Latest compiled and minified JavaScript for BootstrapValidator OFFLINE-->
	<script src="<?= base_url()?>assets/js/bootstrapValidator.min.js"></script>
	
	<!-- Bootstrap DateTimePicker JS OFFLINE-->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js"></script> -->
	<!-- Bootstrap DateTimePicker JS ONLINE-->
	<script src="<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Jquery Datatables ONLINE-->
	<!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
	<!-- Jquery Datatables OFFLINE-->
	<script src="<?= base_url()?>assets/js/jquery.dataTables.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="<?= base_url()?>assets/js/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?= base_url()?>assets/js/startmin.js"></script>

	<!-- AngularJS ONLINE-->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script> -->
	<!-- AngularJS OFFLINE -->
	<script src="<?= base_url()?>assets/js/angular.min.js"></script>

	<!-- AngularJS Route ONLINE -->
	<!-- <script src="https://code.angularjs.org/1.5.0/angular-route.min.js"></script> -->
	<!-- AngularJS Route OFFLINE -->
	<script src="<?= base_url()?>assets/js/angular-route.min.js"></script>
	
	<!-- CKeditor JS OFFLINE -->	
	<!-- <script src="//cdn.ckeditor.com/4.6.0/basic/ckeditor.js"></script> -->

	<!-- Framework AngularJS -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/siscosed.js"></script>

	<!-- MultiSelect -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/multiple-select.js"></script>
	
    <title>SISCOSED</title> 
</head>
<body>
	<div id="wrapper">

