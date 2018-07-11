<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	Formulario para crear Estudiantes
</h1>


<div class="container">
	<form action="<?php echo ROOT_URL; ?>/students/store"" method="POST" >
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" name="name" placeholder="Escribe tu nombre">
		</div>
		<div class="form-group">
			<label for="">Edad: </label>
			<input type="number" name="age" min="0">
		</div>

		<div class="form-group">
			<input type="submit" class="btn-green" value="Guardar">
		</div>
	</form>
</div>

<?php
	require ROOT_FILE . '/views/partials/footer.php';
?>