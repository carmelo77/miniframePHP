<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	Lista de Estudiantes 
</h1>

<table border="1" cellpadding="5">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Edad</th>
			<th>Sección</th>
			<th colspan="2">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($data['students'] as $s) {
				echo "
					<tr>
						<td>".$s->id."</td>
						<td>".$s->name."</td>
						<td>".$s->age."</td>
						<td>".$s->name_section."</td>
						<td>
							<a href='" . ROOT_URL ."/students/edit/".$s->id."' >
								Edit
							</a>
						</td>
						<td>
							<form action='" . ROOT_URL ."/students/destroy/".$s->id."' method='POST'>
								<input type='submit' value='Delete' />
							</form>
						</td>
					</tr>
				";
			}
		?>
	</tbody>
</table>



<?php
	require ROOT_FILE . '/views/partials/footer.php';
?>