<div class="container">
        <section id="medicament">        
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row">
                        </br></br></br></br>
                        <h1>Médicaments</h1>
                    <table class="medicament" border=1>
<?PHP
	$sql = $db ->query('CALL visuMedicament');
	$nb=$sql->rowCount();

	echo "<tr><th><center>Modifier</center></th><th><center>Supprimer</center></th>
				<th><center>Médicament</center></th>
				<th><center>Prix unitaire(€)</center></th>
				<th><center>Stock</center></th></tr>";

	while($data = $sql->fetch())
	{
		echo "<tr>";
		echo "<td> <a href='./medicament/mod.php?numm=".$data['numm']."'><input type='button' value='Modifier'></a> </td>";
		echo "<td>".'<a href="./medicament/delete.php?numm='.$data['numm'].'"><input type="button" value="Supprimer"></a>'."</td>";
		echo "<td>".$data['nomm'] ."</td>";		
		echo "<td>".$data['prixm'] ."</td>";
		echo "<td>".$data['stock'] ."</td>";
		echo "<tr>";
	}
	$sql->CloseCursor();	
	echo"<a href='./medicament/formulaire.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";

?>
</table>
</div>
</div>
</section>
</br></br></br></br>