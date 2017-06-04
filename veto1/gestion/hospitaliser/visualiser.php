<div class="container">
<section id="suivi">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br></br></br></br></br></br></br></br>
                <h1>Suivi à distance</h1>

            <table class="suivi" border=1>                    

<?PHP

	//SI UTILISATEUR EST UN CLIENT

	if($_SESSION['type']==2)
	{
		$sql = $db ->query('SELECT hospitaliser.numh,hospitaliser.date_entree,hospitaliser.heure_entree,
							hospitaliser.date_sortie,hospitaliser.heure_sortie,
							hospitaliser.commentaires,hospitaliser.numa,animal.noma,
							proprietaire.id_user
							FROM hospitaliser 
							INNER JOIN animal ON hospitaliser.numa=animal.numa
							INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
							WHERE animal.id_user="'.$_SESSION['id_user'].'"');

	$nb=$sql->rowCount();

	if($nb==0)
		{
			echo'<p>Il n\'y a aucune hospitalisation en cours.</p>';
		}else
		{
			//AFFICHE

			echo "<tr>
						<th><center>Nom</center></th>
						<th><center>Date d'entrée (aaaa/mm/jj)</center></th>
						<th><center>Heure d'entrée</center></th>
						<th><center>Date de sortie (aaaa/mm/jj)</center></th>
						<th><center>Heure de sortie</center></th>
						<th><center>Commentaires</center></th>
						</tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".$data['noma'] ."</td>";
				echo "<td>".$data['date_entree'] ."</td>";		
				echo "<td>".$data['heure_entree'] ."</td>";
				echo "<td>".$data['date_sortie'] ."</td>";
				echo "<td>".$data['heure_sortie'] ."</td>";
				echo "<td>".$data['commentaires'] ."</td>";
				echo "<tr>";
			}
			$sql->CloseCursor();
		}
	}

	//SI UTILISATEUR EST UN ADMIN OU UN VETERINAIRE

	if($_SESSION['type']==1 ||$_SESSION['type']==3)
	{
		$sql = $db ->query('SELECT hospitaliser.numh,hospitaliser.date_entree,hospitaliser.heure_entree,
							hospitaliser.date_sortie,hospitaliser.heure_sortie,
							hospitaliser.commentaires,hospitaliser.numa,animal.noma
							FROM hospitaliser 
							INNER JOIN animal ON hospitaliser.numa=animal.numa
							INNER JOIN veterinaire ON hospitaliser.id_user=veterinaire.id_user
							WHERE hospitaliser.id_user="'.$_SESSION['id_user'].'"');
		$nb=$sql->rowCount();
		if($nb==0)
		{
			echo'<p>Il n\'a aucune hospitalisation en cours.</p>';
		}else
		{

			//AFFICHE

			echo "<tr><th><center>Modifier</center></th>
						<th><center>Nom</center></th>
						<th><center>Date d'entrée (aaaa/mm/jj)</center></th>
						<th><center>Heure d'entrée</center></th>
						<th><center>Date de sortie (aaaa/mm/jj)</center></th>
						<th><center>Heure de sortie</center></th>
						<th><center>Commentaires</center></th>
						</tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".'<a href="./hospitaliser/mod.php?numh='.$data['numh'].'"><input type="button" value="Fin d\'hospitalisation"></a>'."</td>";
				echo "<td>".$data['noma'] ."</td>";
				echo "<td>".$data['date_entree'] ."</td>";		
				echo "<td>".$data['heure_entree'] ."</td>";
				echo "<td>".$data['date_sortie'] ."</td>";
				echo "<td>".$data['heure_sortie'] ."</td>";
				echo "<td>".$data['commentaires'] ."</td>";
				echo "<tr>";
			}
			$sql->CloseCursor();
			echo"<a href='../gestion/hospitaliser/formulaire.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";
		}
	}
?>
</table>
</div>
</div>
</section>
</br></br></br></br></br></br></br></br>