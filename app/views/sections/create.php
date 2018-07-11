<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	Formulario para crear Secciones
</h1>


<div class="container">
	<form action="<?php echo ROOT_URL; ?>/sections/store"" method="POST" >
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" name="name" placeholder="Nombre sección">
		</div>
		<div class="form-group">
			<input type="submit" class="btn-green" value="Guardar">
		</div>
	</form>
</div>

<?php
	require ROOT_FILE . '/views/partials/footer.php';
?>