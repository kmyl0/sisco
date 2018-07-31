<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SICOSED Alertas</title>
</head>
<body>
	<strong>RUTA: 		</strong><?= $idruta; ?><br>
	<strong>REMITENTE:	</strong><?= $nombres." ".$apellidoPaterno." ".$apellidoMaterno; ?><br>
	<strong>REFERENCIA: </strong><?= $referencia ?><br>
	<strong>ASUNTO:		</strong><?= $asunto; ?><br>
	<strong>ENTRAR:  	</strong><a href="<?= $enlace ?>">DMS</a><br>			
</body>
</html>