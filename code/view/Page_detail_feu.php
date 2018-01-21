<?php ob_start(); ?>
	<div class="details">
		<h1 class="first_details_info"><a href="/Hackathon/code"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a> Risque Incendie</h1>
		<section class="rgba-green">
			<h3 class="green"><img src="/Hackathon/code/img/fire_green.png" class="green">Vert</h3>
			<span>
				<strong>Risque faible à modéré</strong> : suivre les recommandations d’usage et de bon sens en matière d'usage du feu, sans préjudice de la réglementation communale et provinciale existante.
			</span>
		</section>
		<section class="rgba-yellow">
			<h3 class="yellow"><img src="/Hackathon/code/img/fire_yellow.png" class="yellow">Jaune</h3>
			<span>
				<strong>Risque élevé</strong> : éviter tout usage du feu à des fins non domestiques, sans préjudice de la réglementation communale et provinciale existante.
			</span>
		</section>
		<section class="rgba-orange">
			<h3 class="orange"><img src="/Hackathon/code/img/fire_orange.png" class="orange">Orange</h3>
			<span>
				<strong>Risque très élevé</strong> : l’usage du feu à des fins non domestiques est interdit sur le territoire de l'ensemble de la province dont au moins une commune est classée en risque orange, sauf dérogation à titre exceptionnel l’accès motorisé aux massifs forestiers sensibles est interdit.
			</span>
		</section>
		<section class="rgba-red last">
			<h3 class="red"><img src="/Hackathon/code/img/fire_red.png" class="red">Rouge</h3>
			<span>
				<strong>Risque extrême</strong> : dès lors qu'une commune est classée en risque rouge, l’usage du feu à des fins non domestiques et l’accès aux massifs forestiers sensibles sont interdits sur l'ensemble de la Nouvelle-Calédonie.
			</span>
		</section>

		<p class="last-p">
			Données en provenances de météo.nc.
		</p>

		<h1 class="last_details_info"><a href="/Hackathon/code"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a></h1>
	</div>
<?php $contents = ob_get_clean(); ?>