<?php ob_start(); ?>
	<div class="details">
		<h1 class="first_details_info"><a href="/Hackathon/code"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a> Baignade</h1>
		

		<section class="rgba-green">
			<h3 class="green"><img src="/Hackathon/code/img/swim_green.png" class="green">Vert</h3>
			<span>
				Eau de <strong>bonne</strong> qualité. <br/> 
				Risque sanitaire <strong>très</strong> faible
			</span>
		</section>
		<section class="rgba-yellow">
			<h3 class="yellow"><img src="/Hackathon/code/img/swim_yellow.png" class="yellow">Jaune</h3>
			<span>
				Qualité des eaux <strong>moyenne</strong><br/>
				Risque sanitaire <strong>existant</strong> mais reste cependant <strong>modéré</strong>.
			</span>
		</section>
		<section class="rgba-orange">
			<h3 class="orange"><img src="/Hackathon/code/img/swim_orange.png" class="orange">Orange</h3>
			<span>
				<strong>Mauvaise</strong> qualité des eaux <br/> Risque sanitaire <strong>élevé</strong> <br/>Baignade <strong>déconseillée</strong>
			</span>
		</section>
		
		<section class="rgba-red last-p">
			<h3 class="red"><img src="/Hackathon/code/img/swim_red.png" class="red">Rouge</h3>
			<span>
				Risque sanitaire <strong>AVÉRÉ</strong><br/>
				Baignade <strong>INTERDITE</strong>
			</span>
		</section>
 
		<h1 class="last_details_info"><a href="/Hackathon/code"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></h1>

	</div>
<?php $contents = ob_get_clean(); ?>