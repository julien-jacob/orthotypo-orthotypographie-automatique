<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link	https://wprock/auteurs/julien-jacob
 * @author	Julien JACOB <contact@wprock.fr>
 * @package	Typographie
 */

function checkbox_option_to_checked( $checkboxValue ) {
	if ( 'on' == $checkboxValue )
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
						{ Version Alpha }
					</strong>
				</small>
			</h1>
		</div>

		<?php /*
		<h2 class="nav-tab-wrapper typographie-nav-tab">
			<ul>
				<li aria-selected="true" href="#tab-options" class="nav-tab nav-tab-active">Options de l'extension</li>
				<li aria-selected="false" href="#tab-memento" class="nav-tab">Rappel des règle de typographie</li>
			</ul>
		</h2>
		 */ ?>

		<div class="box-danger error-js-disable">
			Erreur ! Il semblerait que le <strong>JavaScript</strong> ne fonctionne pas correctement...
		</div>

		<form class="" method="post" action="options.php">

			<?php
				settings_fields( 'typographie-settings-group' );
				do_settings_sections( 'typographie-settings-group' );
			?>

			<div class="admin-tab" id="tab-options">

				<div class="admin-part">
					<h2 class="title">Règles à appliquer</h2>
					<br/>
					<div class="indent">
						<div class="checkbox">
							<input type="checkbox" name="rules-nbsp_before" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-nbsp_before' ) )); ?>> Utiliser un espace insécable avant les caractères suivants : <code>:</code>, <code>!</code>, <code>?</code>, <code>;</code>, <code>»</code>.
						</div>

						<div class="checkbox">
							<input type="checkbox" name="rules-nbsp_after" <?php checkbox_option_to_checked(esc_attr( get_option( 'rules-nbsp_after' ) )); ?>> Utiliser un espace insécable après le caractère suivant : <code>«</code>.
						</div>
					</div>
				</div>

				<div class="admin-part">
					<h2 class="title">Gestion des filtres</h2>

					<div class="indent">
						<p>Les filtres permettent de définir sur quels éléments du site l'extension agira. Vous pouvez retrouver <a href="https://codex.wordpress.org/Plugin_API/Filter_Reference" target="_blank">la liste des filtres disponibles dans le codex WordPress</a>.</p>
						<div class="indent">
							<textarea name="global-filters" rows="8" cols="80"><?php echo esc_attr( get_option( 'global-filters' ) ); ?></textarea>
						</div>
					</div>
				</div>

				<div class="admin-part">
					<h2 class="title">Options pour les éditeurs </h2>
					<div class="indent">
						<p>Ces options permettent de constater facilement l'effet de l'extension sur le site. Ces paramètres ne sont actifs que pour les utilisateurs étant connectés et ayant les droits <strong>administrateur</strong>.</p>

						<div class="indent">

							<div class="checkbox">
								<input type="checkbox" name="debug_options-replace_space_by_underscore" <?php checkbox_option_to_checked(esc_attr( get_option( 'debug_options-replace_space_by_underscore' ) )); ?>> Utiliser les tirets bas (underscores <code>_</code>) pour rendre visible les espaces insécables ajoutés par l'extension.
							</div>

							<div class="checkbox">
								<input type="checkbox" name="debug_options-use_red_color" <?php checkbox_option_to_checked(esc_attr( get_option( 'debug_options-use_red_color' ) )); ?>> Souligner les textes traités en rouge en utilisant la balise <code>&lt;ins&gt;</code>.
							</div>

						</div>
					</div>
				</div>

				<div class="admin-part">
					<?php submit_button();?>
				</div>
			</div>

		</form>

		<?php /*
		<div class="admin-tab" id="tab-memento">
			<div class="admin-part">
				<h2 class="title">En cour de rédaction</h2>
			</div>
		</div>
		 */ ?>
	</div>
</div>
