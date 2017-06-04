<div class="container">
<section id="consultation">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br></br></br></br></br></br></br>
                <h1>Consultations</h1>

            <table class="consultation" border=1>                    
<?PHP
	switch ($_SESSION['type']) 
	{
		case 2:
			$sql = $db ->query('SELECT animal.noma,veterinaire.nom,consultation.datec,consultation.heurec,consultation.prixc
								FROM consultation
								INNER JOIN animal ON consultation.numa=animal.numa
								INNER JOIN veterinaire ON consultation.id_user=veterinaire.id_user
								INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
								WHERE proprietaire.id_user="'.$_SESSION['id_user'].'"
								ORDER BY consultation.datec');
			$nb=$sql->rowCount();

			if($nb==0)
			{
				echo'<p>Vous n\'avez pas encore de consultations.</p>';
			}else
			{

				echo "<tr>
						<th><center>Nom de l'animal</center></th>
						<th><center>Nom du vétérinaire</center></th>
						<th><center>Date de la consultation (aaaa/mm/jj)</center></th>
						<th><center>Heure de la consultation</center></th>
						<th><center>Prix de la consultation</center></th>
					 </tr>";

				while($data = $sql->fetch())
					{
						echo "<tr>";
						echo "<td>".$data['noma'] ."</td>";
						echo "<td>".$data['nom'] ."</td>";
						echo "<td>".$data['datec'] ."</td>";
						echo "<td>".$data['heurec'] ."</td>";
						echo "<td>".$data['prixc'] ."</td>";
						echo "<tr>";
					}
			}
		break;
		
		case 3:
			$sql = $db ->query('SELECT animal.noma,consultation.datec,consultation.heurec,consultation.prixc
			FROM consultation
			INNER JOIN animal ON consultation.numa=animal.numa
			INNER JOIN veterinaire ON consultation.id_user=veterinaire.id_user
			WHERE veterinaire.id_user="'.$_SESSION['id_user'].'"
			ORDER BY consultation.datec');

			$nb=$sql->rowCount();

			if($nb==0)
			{
				echo'<p>Vous n\'avez pas encore de consultations.</p>';
			}else
			{
				echo "<tr>
						<th><center>Nom de l'animal</center></th>
						<th><center>Date de la consultation (aaaa/mm/jj)</center></th>
						<th><center>Heure de la consultation</center></th>
						<th><center>Prix de la consultation</center></th>
					 </tr>";

				while($data = $sql->fetch())
					{
						echo "<tr>";
						echo "<td>".$data['noma'] ."</td>";
						echo "<td>".$data['datec'] ."</td>";
						echo "<td>".$data['heurec'] ."</td>";
						echo "<td>".$data['prixc'] ."</td>";
						echo "<tr>";
					}
			}
		break;

		case 4:
			$sql = $db ->query('SELECT animal.noma,veterinaire.nom,consultation.numc,consultation.datec,consultation.heurec,consultation.prixc
								FROM consultation
								INNER JOIN animal ON consultation.numa=animal.numa
								INNER JOIN veterinaire ON consultation.id_user=veterinaire.id_user
								ORDER BY consultation.datec');

			echo "<tr>
					<th><center>Nom de l'animal</center></th>
					<th><center>Nom du vétérinaire</center></th>
					<th><center>Date de la consultation (aaaa/mm/jj)</center></th>
					<th><center>Heure de la consultation</center></th>
					<th><center>Prix de la consultation</center></th>
					<th><center>Modifier l'horaire</center></th>
					<th><center>Annuler</center></th>
				 </tr>";

			while($data = $sql->fetch())
				{
					echo "<tr>";
					echo "<td>".$data['noma'] ."</td>";
					echo "<td>".$data['nom'] ."</td>";
					echo "<td>".$data['datec'] ."</td>";
					echo "<td>".$data['heurec'] ."</td>";
					echo "<td>".$data['prixc'] ."</td>";
					echo "<td>".'<a href="./calendrier/mod.php?numc='.$data['numc'].'"><input type="button" value="Modifier"></a>'."</td>";
					echo "<td>".'<a href="./calendrier/delete.php?numc='.$data['numc'].'"><input type="button" value="Annuler"></a>'.'</td>';
					echo "<tr>";
				}	
				echo"<a href='./calendrier/formulaire.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";

		break;
	}
	
?>
</table>
</div>
</div>
</section>
</br></br></br></br></br></br></br></br></br>