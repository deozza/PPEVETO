<div class="container">
        <section id="contact">        
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row">
                </br></br></br>
				<h1>Contact</h1>
				<form method="POST" action="traitement.php" name="contact" >
					<fieldset style="width: 680px"><legend>Vos coordonnées</legend>
						<p><label for="nom">Nom </label>
						<input required type="text" id="nom" name="nom" tabindex="1" style="width: 650px" /></p>
						<p><label for="email">Email </label>
						<input required type="text" id="email" name="email" tabindex="2" style="width: 650px" /></p>
					</fieldset>
				 
					<fieldset style="width: 680px"><legend>Votre message</legend>
						<label for ="objet">Objet du mail</label>
						<select name="objet">
							<option value="">-----------</option>
							<option value='Rendez-vous'>Prendre rendez-vous</option>
							<option value='Question'>Question</option>
						</select>
						<p><label for="message">Message </label>
						<textarea required id="message" name="message" tabindex="4" rows="8" style="width: 650px"></textarea></p>
					</fieldset><input type="submit" name="envoi" value="Envoyer!" /></div>
				</form>
			</div>
		</section>