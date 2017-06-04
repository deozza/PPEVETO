<?php
	require_once '../utilities/header.php';
	require_once '../utilities/secure.php';
?>

	<body>
		<div id="general">
			<?PHP require_once("../utilities/menu.php") ?>
			<div id="visuMedic">
				<form method="POST" action='register.php'>
					<label for="commentaires">Motif de la consultation : </label>
					<input required type="text" name ="commentaires"></br>

					<label for ="prixms">Prix : </label>
					<input required type="number" name="prixms"></br>

					<input type="submit" name ="Valider" value="Valider" />
				</form>
			</div>
	</body>
</html>

<?php require_once '../utilities/footer.php'; ?>