<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link	https://wprock/auteurs/julien-jacob
 * @author	Julien JACOB <contact@wprock.fr>
 * @package	Typographie
 */

function checkbox_option_to_checked( $checkboxValue ) {
	if ( 'on' === $checkboxValue )
		echo 'checked';
}
?>

<div class="typographie-admin">
	<div class="wrap">

		<div class="header">
			<h1>
				<strong>
					Typographie
				</strong>
				<small>
					<strong>
						{ Version 0.1.0 Beta }
					</strong>
				</small>
			</h1>
		</div>

		<h2 class="nav-tab-wrapper typographie-nav-tab">
			<ul>
				<li aria-selected="true" href="#tab-options" class="nav-tab nav-tab-active">Règles à appliquer</li>
				<li aria-selected="false" href="#tab-filters" class="nav-tab">Gestion des filtres</li>
				<li aria-selected="false" href="#tab-admin-options" class="nav-tab">Options pour les admistrateurs</li>
			</ul>
		</h2>

		<div class="box-danger error-js-disable">
			Erreur ! Il semblerait que le <strong>JavaScript</strong> ne fonctionne pas correctement...
		</div>

		<form class="typographie-form" method="post" action="options.php">

			<?php
				settings_fields( 'typographie-settings-group' );
				do_settings_sections( 'typographie-settings-group' );
			?>

			<div class="admin-tab" id="tab-options" style="display: block;">

				<div class="admin-part">
					<h3>Ponctuation, guillemets et pourcentage</h3>
					<div class="indent">
						<div class="checkbox">
							<input type="checkbox" name="rules-punctuation" id="input-rules-punctuation" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-punctuation' ) )); ?>>
							<label for="input-rules-punctuation">Espace insécables pour la <strong>ponctuation</strong>&nbsp;: remplacer <code> :</code>, <code> !</code>, <code> ?</code> et <code> ;</code> par <code>_:</code>, <code>_!</code>, <code>_?</code> et <code>_;</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-quotation_marks" id="input-rules-quotation_marks" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-quotation_marks' ) )); ?>>
							<label for="input-rules-quotation_marks">Espace insécable pour les <strong>guillemets</strong>&nbsp;: remplacer <code>«</code> et <code>»</code> par <code>«_</code> et <code>_»</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-percentage" id="input-rules-percentage" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-percentage' ) )); ?>>
							<label for="input-rules-percentage">Espace insécable pour les <strong>pourcentages</strong>&nbsp;: remplacer <code> %</code> par <code>_%</code>.</label>
						</div>

					</div>

					<h3>Civilités</h3>
					<div class="indent">

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_m" id="input-rules-pleasantries_m" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-pleasantries_m' ) )); ?>>
							<label for="input-rules-pleasantries_m">Espaces insécables et abréviations pour <strong>monsieur</strong> et <strong>messieurs</strong>&nbsp;: remplacer <code>M. </code> et <code>MM. </code> en <code>M._</code> et <code>MM._</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_mme" id="input-rules-pleasantries_mme" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-pleasantries_mme' ) )); ?>>
							<label for="input-rules-pleasantries_mme">Espaces insécables et abréviations pour <strong>madame</strong> et <strong>mesdames</strong>&nbsp;: remplacer <code>Mme </code> et <code>Mmes </code> en <code>M<sup>me</sup>_</code> et <code>M<sup>mes</sup>_</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_mlle" id="input-rules-pleasantries_mlle" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-pleasantries_mlle' ) )); ?>>
							<label for="input-rules-pleasantries_mlle">Espaces insécables et abréviations pour <strong>mademoiselle</strong> et <strong>mesdemoiselles</strong> &nbsp;: remplacer <code>Mlle </code> et <code>Mlles </code> en <code>M<sup>lle</sup>_</code> et <code>M<sup>lles</sup>_</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_dr" id="input-rules-pleasantries_dr" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-pleasantries_dr' ) )); ?>>
							<label for="input-rules-pleasantries_dr">Espaces insécables et abréviations pour <strong>docteur</strong> et <strong>docteurs</strong> &nbsp;: remplacer <code>Dr </code> et <code>Drs </code> en <code>D<sup>r</sup>_</code> et <code>D<sup>rs</sup>_</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_pr" id="input-rules-pleasantries_pr" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-pleasantries_pr' ) )); ?>>
							<label for="input-rules-pleasantries_pr">Espaces insécables et abréviations pour <strong>professeur</strong> et <strong>professeurs</strong> &nbsp;: remplacer <code>Pr </code> et <code>Prs </code> en <code>P<sup>r</sup>_</code> et <code>P<sup>rs</sup>_</code>.</label>
						</div>

					</div>


					<?php /*
					<h3>Heures</h3>
					<div class="indent">
						<div class="checkbox">
							<input type="checkbox" name="rules-hour" id="input-rules-hour" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-hour' ) )); ?>>
							<label for="input-rules-hour">Espaces insécables pour les heures : </label>
							<div class="indent">
								<ul>
									<li>remplacer <code>12 h</code> par <code>12_h</code>,</li>
									<li>remplacer <code>12 h 30</code> par <code>12_h_30</code>,</li>
									<li>remplacer <code>12 h 30 min</code> par <code>12_h_30_min</code>,</li>
									<li>remplacer <code>12 h 30 min 30 s</code> par <code>12_h_30_min_30_s</code>.</li>
								</ul>
							</div>
						</div>
					</div>
					 */ ?>


					<h3>Nombres&nbsp;: adjectifs ordinaux</h3>
					<div class="indent">
						<div class="checkbox">
							<input type="checkbox" name="rules-number-er" id="input-rules-number-er" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-number-er' ) )); ?>>
							<label for="input-rules-number-er">Abréviations&nbsp;: remplacer <code>1er</code> et <code>1re</code> en <code>1<sup>er</sup></code> et <code>1<sup>re</sup></code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-number-nd" id="input-rules-number-nd" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-number-nd' ) )); ?>>
							<label for="input-rules-number-nd">Abréviations&nbsp;: remplacer <code>2nd</code> et <code>2de</code> en <code>2<sup>nd</sup></code> et <code>2<sup>de</sup></code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-number-e" id="input-rules-number-e" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-number-e' ) )); ?>>
							<label for="input-rules-number-e">Espaces insécables et abréviations&nbsp;: remplacer <code>2e</code>,<code>3e</code>, ... en <code>2<sup>e</sup></code>, <code>3<sup>e</sup></code>, ...</label>
						</div>
					</div>

				</div>
			</div>

			<div class="admin-tab" id="tab-filters">
				<div class="admin-part">
					<p>Les filtres permettent de définir sur quels éléments du site l'extension agira. Vous pouvez retrouver <a href="https://codex.wordpress.org/Plugin_API/Filter_Reference" target="_blank">la liste des filtres disponibles dans le codex WordPress</a>.</p>
					<div class="indent">
						<textarea name="global-filters" rows="8" cols="80"><?php echo esc_attr( get_option( 'global-filters' ) ); ?></textarea>
					</div>
				</div>
			</div>

			<div class="admin-tab" id="tab-admin-options">
				<div class="admin-part">
					<p>Ces options permettent de constater facilement l'effet de l'extension sur le site. Ces paramètres ne sont actifs que pour les utilisateurs étant connectés et ayant les droits <strong>administrateur</strong>.</p>

					<div class="indent">

						<div class="checkbox">
							<input type="checkbox" name="debug_options-replace_space_by_underscore" id="input-debug_options-replace_space_by_underscore" <?php checkbox_option_to_checked(esc_attr( get_option( 'debug_options-replace_space_by_underscore' ) )); ?>>
							<label for="input-debug_options-replace_space_by_underscore">Utiliser les tirets bas (underscores <code>_</code>) pour rendre visible les espaces insécables ajoutés par l'extension.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="debug_options-use_red_color" id="input-debug_options-use_red_color" <?php checkbox_option_to_checked(esc_attr( get_option( 'debug_options-use_red_color' ) )); ?>>
							<label for="input-debug_options-use_red_color">Colorer en rouge les textes traités en utilisant la balise <code>&lt;ins&gt;</code>.</label>
						</div>

					</div>
				</div>
			</div>

			<?php submit_button();?>
		</form>



	</div>
</div>
