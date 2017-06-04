<div class="container">
	<section id="prescription">        
	    <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
	        <div class="row">
	            </br></br></br></br></br></br></br></br>
	            <h1>Prescriptions</h1>

	        <table class="prescription" border=1>                    

<?PHP
	if($_SESSION['type']==2)
	{
		$sql = $db ->query("SELECT prescrire.numa,prescrire.numm, prescrire.posologiem, prescrire.quantiteem, prescrire.date_prescription, prescrire.date_fin, animal.noma, medicament.nomm
							 FROM prescrire
							 INNER JOIN medicament ON prescrire.numm=medicament.numm
							 INNER JOIN animal ON prescrire.numa=animal.numa
							  WHERE animal.id_user=".$_SESSION['id_user']."");
		//$nb=$sql->rowCount();
		if($sql==false)
		{
			echo'<p>Vous n\'avez pas encore de prescription.</p>';
		}else
		{
			?><div id="visuConsultation"><?PHP
			echo "<tr>
						<th><center>Animal</center></th>
						<th><center>Medicament</center></th>
						<th><center>Posologie</center></th>
						<th><center>Quantite</center></th>
						<th><center>Debut du traitement</center></th>
						<th><center>Fin du traitement</center></th></tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".$data['noma'] ."</td>";		
				echo "<td>".$data['nomm'] ."</td>";
				echo "<td>".$data['posologiem'] ."</td>";
				echo "<td>".$data['quantiteem'] ."</td>";
				echo "<td>".$data['date_prescription'] ."</td>";
				echo "<td>".$data['date_fin'] ."</td>";
				echo "<tr>";
			}
		}	
	}
	elseif($_SESSION['type']==3 || $_SESSION['type']==1)
	{
		$sql = $db ->query("SELECT p.id_user,p.numa,p.numm, p.posologiem, p.quantiteem, p.date_prescription, p.date_fin, a.noma, m.nomm
							 FROM prescrire p
							 INNER JOIN medicament m ON p.numm=m.numm
							 INNER JOIN animal a ON p.numa=a.numa
							  WHERE p.id_user=".$_SESSION['id_user']."");
		$nb=$sql->rowCount();
		if($nb==0)
			{
				echo'<p>Vous n\'avez pas encore de prescription.</p>';
			}else
			{
			?><div id="visuConsultation"><?PHP
			echo "<tr>
						<th><center>Animal</center></th>
						<th><center>Medicament</center></th>
						<th><center>Posologie</center></th>
						<th><center>Quantite</center></th>
						<th><center>Debut du traitement</center></th>
						<th><center>Fin du traitement</center></th></tr>";

			while($data = $sql->fetch())
			{
				echo "<tr>";
				echo "<td>".$data['noma'] ."</td>";		
				echo "<td>".$data['nomm'] ."</td>";
				echo "<td>".$data['posologiem'] ."</td>";
				echo "<td>".$data['quantiteem'] ."</td>";
				echo "<td>".$data['date_prescription'] ."</td>";
				echo "<td>".$data['date_fin'] ."</td>";
				echo "<tr>";
			}
		echo"<a href='./prescription/formulaire.php'><input style='margin-left: 10px;' type='button' value='Ajout'></a>";
		}
	}	
?>
</table>
</div>
</div>
</section>
</br></br></br></br></br></br></br></br>