<p>
	<a class="btn btn-primary" data-toggle="modal" data-target="#mdlAlta"><span class="glyphicon glyphicon-plus"></span></a>
</p>
<ul class="list-group">
<?php foreach ($Cites as $cite): ?>
<li class="list-group-item">
	<?= $cite->nombre ?>
	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#mdlModificar" 
		data-idcite="<?= $cite->idcite;?>" 
		data-nombre="<?= $cite->nombre;?>"
		data-idusuario="<?= $Personal->idusuario;?>" >
		<span class="glyphicon glyphicon-pencil"></span>
	</button>
</li>
<?php endforeach; ?>
</ul>