<!DOCUMENT html>
<html lang="es">
<head>
	<!-- Metadata -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- HOJAS DE ESTILO -->
	<!-- Latest compiled and minified CSS ONLINE-->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
	<!-- Latest compiled and minified CSS OFFLINE-->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css"/>

	<!-- Optional theme ONLINE-->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"/> -->
	<!-- Optional theme OFFLINE-->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-theme.css"/>

	<!-- Bootstrap Validator theme ONLINE-->
	<!-- <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"/> -->
	<!-- Bootstrap Validator theme OFFLINE-->
	<link href="<?= base_url()?>assets/css/bootstrapValidator.min.css" rel="stylesheet"/>

	<!-- Bootstrap DateTimePicker ONLINE -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.css" rel="stylesheet"> -->
	<!-- Bootstrap DateTimePicker OFFLINE -->
	<link href="<?= base_url()?>assets//css/bootstrap-datetimepicker.css" rel="stylesheet">

	<!-- Jquery UI Theme -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/jquery-ui.css">

	<!-- JQUERY Datatables ONLINE-->
	<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> -->
	<!-- JQUERY Datatables OFFLINE-->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/jquery.dataTables.min.css">
	
	<link href="<?= base_url()?>assets/css/elegant-icons-style.css" rel="stylesheet" />
	
	<!-- SCRIPTS -->

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
	<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script> -->
	
	<!-- Bootstrap DateTimePicker JS OFFLINE-->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js"></script> -->
	<!-- Bootstrap DateTimePicker JS ONLINE-->
	<script src="<?= base_url()?>assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Jquery Datatables ONLINE-->
	<!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
	<!-- Jquery Datatables OFFLINE-->
	<script src="<?= base_url()?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url()?>assets/js/dataTables.bootstrap.min.js"></script>

	<!-- AngularJS ONLINE-->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script> -->
	<!-- AngularJS OFFLINE -->
	<script src="<?= base_url()?>assets/js/angular.min.js"></script>

	<!-- AngularJS Route ONLINE -->
	<!-- <script src="https://code.angularjs.org/1.5.0/angular-route.min.js"></script> -->
	<!-- AngularJS Route OFFLINE -->
	<script src="<?= base_url()?>assets/js/angular-route.min.js"></script>
	
	<!-- CKeditor JS OFFLINE -->	
	<!-- <script src="<?= base_url(); ?>assets/js/ckeditor/ckeditor.js"></script> -->

	<!-- Framework AngularJS -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/siscosed.js"></script>
	
    <title>DMS</title> 
</head>
<body class="login-body" ng-app="sis">
	<style type="text/css">
		#container {			
		    width: 100%;
		    height: 100%;
		}
		.login-body {
		    background-color: #222344;
		}
		.login-img-body{
		  background: url('../img/bg-1.jpg') no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		.login-img2-body{
		  background: url('../img/bg-1.jpg') no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		.login-img3-body{
		  background: url('../img/bg-1.jpg') no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}

		.login-form {
		    max-width: 350px;
		    margin: 200px auto 0;
		    background: #d5d7de;    
		}
		.login-img-body .login-form{
		    max-width: 350px;
		    margin: 200px auto 0;
		    background: rgba(213,215,222,0.4);
		    border: 1px solid #B0B6BE;
		}
		.login-img2-body .login-form{
		    border: 1px solid #B0B6BE;
		    background: rgba(213,215,222,0.7);
		}
		.login-img3-body .login-form{
		    border: 1px solid #B0B6BE;
		    background: rgba(213,215,222,0.9);
		}
		.login-form a{
		    color: #688a7e !important;
		}
		.login-form h2.login-form-heading {
		    margin: 0;
		    padding:20px 15px;
		    text-align: center;
		    background: #34aadc;
		    border-radius: 5px 5px 0 0;
		    -webkit-border-radius: 5px 5px 0 0;
		    color: #fff;
		    font-size: 18px;
		    text-transform: uppercase;
		    font-weight: 300;
		    font-family: 'Lato', sans-serif;
		}

		.login-form .checkbox {
		    margin-bottom: 14px;
		}
		.login-form .checkbox {
		    font-weight: normal;    
		    font-weight: 300;
		    font-family: 'Lato', sans-serif;
		}
		.login-form .form-control {
		    position: relative;
		    font-size: 16px;
		    height: auto;
		    padding: 10px;
		    -webkit-box-sizing: border-box;
		    -moz-box-sizing: border-box;
		    box-sizing: border-box;
		}
		.login-form .form-control:focus {
		    z-index: 2;
		}
		.login-form .login-img{
		    font-size: 50px;
		    font-weight: 300;    
		}
		.login-form .input-group{
		    padding-bottom: 15px;
		}
		.login-form .input-group-addon{
		    padding: 6px 12px;
		    font-size: 16px;
		    color: #8b9199;
		    font-weight: normal;
		    line-height: 1;
		    text-align: center;
		    background-color: #ffffff;
		    border: none;
		    border-radius: 0;
		}
		.login-form input[type="text"], .login-form input[type="password"] {    
		    border: none;
		    box-shadow: none;
		    font-size: 16px;
		    border-radius: 0; 
		}
		.login-form .btn{
		    border-radius: 0;
		}
		.login-form .btn-login {
		    background: #f67a6e;
		    color: #fff;
		    text-transform: uppercase;
		    font-weight: 300;
		    font-family: 'Lato', sans-serif;
		    box-shadow: 0 4px #e56b60;
		    margin-bottom: 20px;
		}

		.login-form p {
		    text-align: center;
		    color: #b6b6b6;
		    font-size: 16px;
		    font-weight: 300;
		}
		.login-img3-body .login-form p,.login-img2-body .login-form p {
		    color: #34aadc;
		}
		.login-form a {
		    color: #b6b6b6;
		}

		.login-form a:hover {
		    color: #34aadc;
		}
		.form .required{
		    font-size: 16px;
		    color: #00a0df;
		}

		.login-wrap {
		    padding: 20px;
		}

	</style>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#frmLogin').bootstrapValidator({
			framework: 'bootstrap',
			message: 'Este valor no es valido',
			feedbackIcons: {
				validating: 'glyphicon glyphicon-refresh'
			},
			fields : {
				password0 : {
					validators : {
						notEmpty : {
							message : 'La contraseña actual es un dato requerido'
						}
					}
				},
				password1 : {
					validators : {
						notEmpty : {
							message : 'El contraseña nueva es un dato requerido'
						}
					}
				},
				password2 : {
					validators : {
						notEmpty : {
							message : 'Repertir la contraseñaes un dato requerido'
						},
						callback : {
							message : 'Las Contraseñas no coinciden',
							callback : function(value, validator) {
								return $('#password1').val() == $('#password2').val();
							}
						}
					}
				}
			}
		});
	});
	</script>
	<div id="container" class="container">
		<form class="login-form" action="<?= base_url()?>home/resetPassword" method="POST">        
			<div class="login-wrap">
				<p class="login-img"><i class="icon_lock_alt"></i></p>
				<h1>Nuevo Contraseña</h1>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon_profile"></i></span>
					<input type="text" class="form-control" placeholder="Contraseña Actual" name="passwor0"  value="<?= set_value('password0'); ?>">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon_key_alt"></i></span>
					<input type="password" class="form-control" placeholder="Nueva Contraseña" name="password1" id="password1" value="<?= set_value('password1'); ?>">
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon_key_alt"></i></span>
					<input type="password" class="form-control" placeholder="Repetir Contraseña" name="password2" id="password2" value="<?= set_value('password2'); ?>">
				</div>
				<button class="btn btn-primary btn-lg btn-block" type="submit">Resetear</button>			
	            <?php echo validation_errors(); ?>				
			</div>			
		</form>
	</div>
</body>
</html>
