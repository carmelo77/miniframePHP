<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	Editar Estudiante
</h1>


<div class="container">
	<form action="<?php echo ROOT_URL; ?>/students/update/<?php echo $data['id']; ?>" method="POST" >
		<div class="form-group">
			<label for="">Nombre: </label>
			<input type="text" name="name" placeholder="Escribe tu nombre" value="<?php echo $data['name']; ?>">
		</div>
		<div class="form-group">
			<label for="">Edad: </label>
			<input type="number" name="age" min="0" value="<?php echo $data['age']; ?>">
		</div>
		<div class="form-group">
			<label for="">Sección: </label>
			<select name="section" id="">
				<?php foreach($data['section'] as $s) : ?>

					<?php if($s->id == $data['id_section']) : ?>
						<option value="<?php echo $s->id ?>" selected>
							<?php echo $s->name ?>
						</option>

					<?php else : ?>
						<option value="<?php echo $s->id ?>">
							<?php echo $s->name ?>
						</option>
					<?php endif; ?>

				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<input type="submit" class="btn-green" value="Guardar">
		</div>
	</form>
</div>

<?php
	require ROOT_FILE . '/views/partials/footer.php';
?>