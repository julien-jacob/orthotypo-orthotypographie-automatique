<?php

/**
 * Provide a admin area view for the plugin
 *
 * @package	Orthotypo
 */

function orthotypo_checkbox_option_to_checked( $checkboxValue ) {
	if ( 'on' === $checkboxValue )
		echo 'checked';
}
?>

<div class="orthotypo-admin">
	<div class="wrap">

		<div class="header">
			<h1>
				<strong>
					Orthotypo
				</strong>
				<small>
					<strong>
						 - Les règles de l'orthotypographie française automatisées
					</strong>
				</small>
			</h1>
		</div>

		<h2 class="nav-tab-wrapper orthotypo-nav-tab">
			<ul>
				<li aria-selected="true" href="#tab-options" class="nav-tab nav-tab-active">Règles à appliquer</li>
				<li aria-selected="false" href="#tab-filters" class="nav-tab">Gestion des filtres</li>
				<li aria-selected="false" href="#tab-admin-options" class="nav-tab">Options pour les admistrateurs</li>
			</ul>
		</h2>

		<noscript>
			<div class="box-danger error-js-disable">
				Erreur ! Il semblerait que le <strong>JavaScript</strong> ne fonctionne pas correctement...
			</div>
		</noscript>

		<form class="orthotypo-form" method="post" action="options.php">

			<?php
				settings_fields( 'orthotypo-settings-group' );
				do_settings_sections( 'orthotypo-settings-group' );
			?>

			<div class="admin-tab" id="tab-options" style="display: block;">

				<div class="admin-part">
					<h3>Ponctuation, guillemets et pourcentage</h3>
					<div class="indent">
						<div class="checkbox">
							<input type="checkbox" name="rules-punctuation" id="input-rules-punctuation" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-punctuation' ) ) ); ?>>
							<label for="input-rules-punctuation">Espace insécables pour la <strong>ponctuation</strong>&nbsp;: remplacer <code> :</code>, <code> !</code>, <code> ?</code> et <code> ;</code> par <code>_:</code>, <code>_!</code>, <code>_?</code> et <code>_;</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-quotation_marks" id="input-rules-quotation_marks" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-quotation_marks' ) ) ); ?>>
							<label for="input-rules-quotation_marks">Espace insécable pour les <strong>guillemets</strong>&nbsp;: remplacer <code>«</code> et <code>»</code> par <code>«_</code> et <code>_»</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-percentage" id="input-rules-percentage" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-percentage' ) ) ); ?>>
							<label for="input-rules-percentage">Espace insécable pour les <strong>pourcentages</strong>&nbsp;: remplacer <code> %</code> par <code>_%</code>.</label>
						</div>

					</div>

					<h3>Civilités</h3>
					<div class="indent">

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_m" id="input-rules-pleasantries_m" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-pleasantries_m' ) ) ); ?>>
							<label for="input-rules-pleasantries_m">Espaces insécables et abréviations pour <strong>monsieur</strong> et <strong>messieurs</strong>&nbsp;: remplacer <code>M. </code> et <code>MM. </code> en <code>M._</code> et <code>MM._</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_mme" id="input-rules-pleasantries_mme" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-pleasantries_mme' ) ) ); ?>>
							<label for="input-rules-pleasantries_mme">Espaces insécables et abréviations pour <strong>madame</strong> et <strong>mesdames</strong>&nbsp;: remplacer <code>Mme </code> et <code>Mmes </code> en <code>M<sup>me</sup>_</code> et <code>M<sup>mes</sup>_</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_mlle" id="input-rules-pleasantries_mlle" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-pleasantries_mlle' ) ) ); ?>>
							<label for="input-rules-pleasantries_mlle">Espaces insécables et abréviations pour <strong>mademoiselle</strong> et <strong>mesdemoiselles</strong> &nbsp;: remplacer <code>Mlle </code> et <code>Mlles </code> en <code>M<sup>lle</sup>_</code> et <code>M<sup>lles</sup>_</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_dr" id="input-rules-pleasantries_dr" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-pleasantries_dr' ) ) ); ?>>
							<label for="input-rules-pleasantries_dr">Espaces insécables et abréviations pour <strong>docteur</strong> et <strong>docteurs</strong> &nbsp;: remplacer <code>Dr </code> et <code>Drs </code> en <code>D<sup>r</sup>_</code> et <code>D<sup>rs</sup>_</code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-pleasantries_pr" id="input-rules-pleasantries_pr" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-pleasantries_pr' ) ) ); ?>>
							<label for="input-rules-pleasantries_pr">Espaces insécables et abréviations pour <strong>professeur</strong> et <strong>professeurs</strong> &nbsp;: remplacer <code>Pr </code> et <code>Prs </code> en <code>P<sup>r</sup>_</code> et <code>P<sup>rs</sup>_</code>.</label>
						</div>

					</div>


					<h3>Nombres&nbsp;: adjectifs ordinaux</h3>
					<div class="indent">
						<div class="checkbox">
							<input type="checkbox" name="rules-number_er" id="input-rules-number_er" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-number_er' ) ) ); ?>>
							<label for="input-rules-number_er">Abréviations&nbsp;: remplacer <code>1er</code>, <code>1ers</code>, <code>1re</code> et <code>1res</code> en <code>1<sup>er</sup></code>, <code>1<sup>ers</sup></code>, <code>1<sup>re</sup></code> et <code>1<sup>res</sup></code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-number_nd" id="input-rules-number_nd" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-number_nd' ) ) ); ?>>
							<label for="input-rules-number_nd">Abréviations&nbsp;: remplacer <code>2nd</code>, <code>2nds</code>, <code>2ne</code> et <code>2des</code> en <code>2<sup>nd</sup></code>, <code>2<sup>nds</sup></code>, <code>2<sup>de</sup></code> et <code>2<sup>des</sup></code>.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-number_e" id="input-rules-number_e" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'rules-number_e' ) ) ); ?>>
							<label for="input-rules-number_e">Espaces insécables et abréviations&nbsp;: remplacer
								<code>2e</code>, <code>2es</code>, <code>3e</code>, <code>3es</code>, ... en
								<code>2<sup>e</sup></code>, <code>2<sup>es</sup></code>, <code>3<sup>e</sup></code>, <code>3<sup>es</sup></code> ...</label>
						</div>
					</div>

				</div>
			</div>

			<div class="admin-tab" id="tab-filters">
				<div class="admin-part">
					<p>Les filtres permettent de définir sur quels éléments du site l'extension agira. Vous pouvez retrouver <a href="https://codex.wordpress.org/Plugin_API/Filter_Reference" target="_blank">la liste des filtres disponibles dans le codex WordPress</a>.</p>
					<textarea name="global-filters" rows="8" cols="80"><?php echo esc_attr( get_option( 'global-filters' ) ); ?></textarea>
				</div>
			</div>

			<div class="admin-tab" id="tab-admin-options">
				<div class="admin-part">
					<p>Ces options permettent de constater facilement l'effet de l'extension sur le site. Ces paramètres ne sont actifs que pour les utilisateurs étant connectés et ayant les droits <strong>administrateur</strong>.</p>

					<div class="indent">

						<div class="checkbox">
							<input type="checkbox" name="debug_options-replace_space_by_underscore" id="input-debug_options-replace_space_by_underscore" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'debug_options-replace_space_by_underscore' ) ) ); ?>>
							<label for="input-debug_options-replace_space_by_underscore">Utiliser les tirets bas (underscores <code>_</code>) pour rendre visible les espaces insécables ajoutés par l'extension.</label>
						</div>

						<div class="checkbox">
							<input type="checkbox" name="debug_options-use_red_color" id="input-debug_options-use_red_color" <?php orthotypo_checkbox_option_to_checked( esc_attr( get_option( 'debug_options-use_red_color' ) ) ); ?>>
							<label for="input-debug_options-use_red_color">Colorer en rouge les textes traités en utilisant la balise <code>&lt;ins&gt;</code>.</label>
						</div>

					</div>
				</div>
			</div>
			<?php submit_button();?>
		</form>

	</div>
</div>
