<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	Editar Sección
</h1>

<div class="container">
	<form action="<?php echo ROOT_URL; ?>/sections/update/<?php echo $data['id']; ?>" method="POST" >
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" name="name" placeholder="Nombre sección" value="<?php echo $data['name']; ?>">
		</div>
		<div class="form-group">
			<input type="submit" class="btn-green" value="Actualizar">
		</div>
	</form>
</div>

<?php
	require ROOT_FILE . '/views/partials/footer.php';
?>