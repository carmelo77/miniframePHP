<?php
	require ROOT_FILE . '/views/partials/header.php';
?>

<h1>
	<?php
		echo $data['titulo'];
	?>
</h1>

<p>
	<ul>
		<?php
			foreach ($data['articles'] as $key) {
				echo "
					<li>".$key->title." - ".$key->description."</li>
				";
			}
		?>
	</ul>
</p>

<?php
	require ROOT_FILE . '/views/partials/footer.php';
?>