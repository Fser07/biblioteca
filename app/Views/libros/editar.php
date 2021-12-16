<?=$header?>
	<h1>Formulario de crear</h1>
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Ingresar datos del libro</h5>
			<p class="card-text">
			
			<form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input id="nombre" class="form-control" type="text" name="nombre">
					</div>

					<div class="form-group">
						<label for="imagen">Imagen</label>
						<img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$libro['image'];?>" width="100" alt="">
						<input id="imagen" class="form-control" type="file" name="imagen">
					</div>
					<br>
					<button class="btn btn-success" type="submit">Guardar</button>
				</form>
			</p>
		</div>
	</div>
<?=$footer?>
