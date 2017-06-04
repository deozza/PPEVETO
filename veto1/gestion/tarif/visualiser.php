<div class="container">
<section id="tarifs">        
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                </br></br></br></br>
                <h1>Tarifs</h1>
<?PHP

    //VERIFIE SI UTILISATEUR EST UN CLIENT OU UN VISITEUR

	if(empty($_SESSION['type']) || $_SESSION['type']==2)
	{
		?>
                    <!-- TARIFS POUR CONSULTATIONS -->

                    <table class="tarifs" border=1>
                        <?php 

                        $sqlC = $db ->query("SELECT nums,prixms,commentaires FROM soins WHERE commentaires like 'Consultation%'");
        $nbC=$sqlC->rowCount();
        echo "<thead>
        		<tr>
                    <th><center>Prix unitaire(€)</center></th>
                    <th><center>Consultations</center></th>
                </tr>
              </thead>"
              ;
        echo "<tfoot>
        		<tr>
                    <th><center>Prix unitaire(€)</center></th>
                    <th><center>Consultations</center></th>
                </tr>
              </tfoot>";

        while($dataC = $sqlC->fetch())
        {
        	echo "<tbody>";
            echo "<tr>";
            echo "<td>".$dataC['prixms'] ."</td>";      
            echo "<td>".$dataC['commentaires'] ."</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?></table>

        <!-- TARIFS POUR VACCINS -->

        <table class="tarifs"border=1>
        <?php

        $sqlV = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Vaccin%'");
        $nbV=$sqlV->rowCount();
        echo "<thead>
        		<tr>
                    <th><center>Prix unitaire(€)</center></th>
                    <th><center>Vaccins</center></th>
                </tr>
               </thead>";
        echo "<tfoot>
        		<tr>
                    <th><center>Prix unitaire(€)</center></th>
                    <th><center>Vaccins</center></th>
                </tr>
               </tfoot>";

        while($dataV = $sqlV->fetch())
        {
        	echo "<tbody>";
            echo "<tr>";
            echo "<td>".$dataV['prixms'] ."</td>";      
            echo "<td>".$dataV['commentaires'] ."</td>";
            echo "<tr>";
            echo "</tbody>";
        }
        ?></table>

        <!-- TARIFS POUR CASTRATION/OVARIECTOMIE -->

        <table class="tarifs"border=1>
        <?PHP

        $sqlS = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Castration%' OR commentaires like 'Ovariectomie%'");
        $nbS=$sqlS->rowCount();
        echo "<thead>
        		<tr>
                    <th><center>Prix unitaire(€)</center></th>
                    <th><center>Stérilisation</center></th>
                </tr>
               </thead>";
        echo "<tfoot>
        		<tr>
                    <th><center>Prix unitaire(€)</center></th>
                    <th><center>Stérilisation</center></th>
                </tr>
               </tfoot>";

        while($dataS = $sqlS->fetch())
        {
        	echo "<tbody>";
            echo "<tr>";
            echo "<td>".$dataS['prixms'] ."</td>";      
            echo "<td>".$dataS['commentaires'] ."</td>";
            echo "<tr>";
            echo "</tbody>";
        }

        ?></table><?php

        $sqlC->CloseCursor();
        $sqlV->CloseCursor();
        $sqlS->CloseCursor();
                        ?>
                        
                    </table>
	<?PHP
	}

    //VERIFIE SI UTILISATEUR EST UN ADMIN, UNE SECRETAIRE OU UN VETO

	else
	{
		$sqlC = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Consultation%'");
		$nbC=$sqlC->rowCount();
		?>

        <!-- TARIFS POUR CONSULTATIONS -->

        <table class="tarifs" border=1><?PHP
		echo "<tr><th><center>Modifier</center></th><th><center>Supprimer</center></th>
					<th><center>Prix unitaire(€)</center></th>
					<th><center>Consultations</center></th></tr>";

		while($dataC = $sqlC->fetch())
		{
			echo "<tr>";
			echo "<td>".'<a href="./tarif/mod.php?nums='.$dataC['nums'].'"><input type="button" value="Modifier"></a>'."</td>";
			echo "<td>".'<a href="./tarif/delete.php?nums='.$dataC['nums'].'"><input type="button" value="Supprimer"></a>'."</td>";
			echo "<td>".$dataC['prixms'] ."</td>";		
			echo "<td>".$dataC['commentaires'] ."</td>";
			echo "<tr>";
		}
		?></table><?php

		$sqlV = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Vaccin%'");
		$nbV=$sqlV->rowCount();
		?>

        <!-- TARIFS POUR VACCINS -->

        <table class="tarifs" border=1><?PHP
		echo "<tr><th><center>Modifier</th><th>Supprimer</center></th>
					<th><center>Prix unitaire(€)</center></th>
					<th><center>Vaccins</center></th></tr>";

		while($dataV = $sqlV->fetch())
		{
			echo "<tr>";
			echo "<td>".'<a href="./mod.php?nums='.$dataV['nums'].'"><input type="button" value="Modifier"></a>'."</td>";
			echo "<td>".'<a href="./delete.php?nums='.$dataV['nums'].'"><input type="button" value="Supprimer"></a>'."</td>";
			echo "<td>".$dataV['prixms'] ."</td>";		
			echo "<td>".$dataV['commentaires'] ."</td>";
			echo "<tr>";
		}
		?></table><?PHP

		$sqlS = $db ->query("SELECT nums, prixms,commentaires FROM soins WHERE commentaires like 'Castration%' OR commentaires like 'Ovariectomie%'");
		$nbS=$sqlS->rowCount();
		?>

        <!-- TARIFS POUR CASTRATION/OVARIECTOMIE -->

        <table class="tarifs" border=1><?PHP
		echo "<tr><th><center>Modifier</th><th>Supprimer</center></th>
					<th><center>Prix unitaire(€)</center></th>
					<th><center>Stérilisation</center></th></tr>";

		while($dataS = $sqlS->fetch())
		{
			echo "<tr>";
			echo "<td>".'<a href="./mod.php?nums='.$dataS['nums'].'"><input  type="button" value="Modifier"></a>'."</td>";
			echo "<td>".'<a href="./delete.php?nums='.$dataS['nums'].'"><input type="button" value="Supprimer"></a>'."</td>";
			echo "<td>".$dataS['prixms'] ."</td>";		
			echo "<td>".$dataS['commentaires'] ."</td>";
			echo "<tr>";
		}

		?></table><?php

		$sqlC->CloseCursor();
		$sqlV->CloseCursor();
		$sqlS->CloseCursor();
	}
?>
</div>
</div>
</section>
</br></br></br></br></br></br>