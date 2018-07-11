<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	Lista de secciones
</h1>

<table border="1" cellpadding="5">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre Sección</th>
			<th colspan="2">Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($data['sections'] as $s) {
				echo "
					<tr>
						<td>".$s->id."</td>
						<td>".$s->name."</td>
						<td>
							<a href='" . ROOT_URL ."/sections/edit/".$s->id."' >
								Edit
							</a>
						</td>
						<td>
							<form action='" . ROOT_URL ."/sections/destroy/".$s->id."' method='POST'>
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