=== Orthotypo ===
Tags: orthotypographie, orthographe, français
Requires at least: 4.9.2
Tested up to: 4.9.2
Stable tag: 4.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

_This plugin is for french typographical syntax_
Orthotypo corrige les espaces insécables qui doivent suivre ou précéder certain signes de ponctuation de la langue française.


== Description ==

La fonctionnalité principale de cette extension WordPress est d’éliminer les signes de ponctuation orphelins qui se retrouvent seuls en début d’une nouvelle ligne.

Pour ce faire, elle automatise l’ajout des espaces insécables qui doivent suivre ou précéder certains signes de ponctuation et symboles comme les points d’exclamation (!), les points interrogation (?), les symboles de pourcentage (%) ou encore les guillemets (« , »).

En plus de l’ajout automatisé d’espaces insécables, l’extension propose d’automatiser simplement un ensemble de règles de l’orthotypographie française, comme la correction des civilités (M., MM., Mme, Mmes,Mlle, Mlles, Dr, Drs, Pr, Prs) et les adjectifs ordinaux(1re, 1er, 2nd, 2de, 2e, 3e, ...). Chacune d’entre elles peut être activée ou désactivée facilement depuis les options du plugin.



== Développement  ==

= 1.0.0 =
* amelioration globale en vue de la publication
* Nouvelle interface d'administration des options de l'extension

= 0.6.0 =
* Rennomer le plugin en : Typographie
* Nétoyer le code et revoir les textes

= 0.0.5 =
* Ajout de règles
** Espace insécable pour les pourcentages : remplacer % par _%.
**  Espaces insécables et abréviations pour monsieur et messieurs : remplacer M.
** Espaces insécables et abréviations pour madame et mesdames : remplacer Mme et Mmes
** Espaces insécables et abréviations pour mademoiselle et mesdemoiselles  : remplacer Mlle et Mlles
** Espaces insécables et abréviations pour docteur et docteurs  : remplacer Dr et Drs
** Espaces insécables et abréviations pour professeur et professeurs  : remplacer Pr et Prs
** Abréviations : remplacer 1er et 1re
** Abréviations : remplacer 2nd et 2de
** Espaces insécables et abréviations : remplacer 2e,3e, ...
* Réorganisation des règlobal-filters
** Gérer les guillemets ouvrantes et fermantes dans la même règle
* Re-factoring de code
* Interface des options refaite, ajout d'un système d'onglet

= 0.4.0 =
* Fix header plugin
* Fix orthotypo->settings->get_settings()
* Fix admin page : Sauvegarde des options
* Simplifier les objets
* Gestion des options par défaut à l'installation de l'extension
* Optimisation du chargement des ressources
* Option pour les éditeurs : colorer les textes traités en rouge avec la balise <ins>

= 0.3.0 =
* Utilisation de tabulations pour l'indentation du code
* Amélioration des commentaires
* Amélioration de l'administration : utilisation de label pour les checkbox + texte
* Nouvelle capture d'écran de l'application
* N'applique plus les règles dans les pages d'administration et les pages du dashboard.
* Correction suite à la relecture du code par l'entreprise woonoz (woonoz.com / projet-voltaire.fr)
** Suppression de code inutile
** Re-factoring de code (array_push(), yoda condition, ...)

= 0.2.0 =
* Ajout et correction des commentaires

= 0.1.0 =
* Utiliser un espace insécable avant les caractères suivants : :, !, ?, ;, »
* Utiliser un espace insécable après le caractère suivant : «
* Gestion des filtres
* Options pour les éditeurs (pour les administrateur uniquement)
** Utiliser les tirets bas (underscores _) pour rendre visible les espaces insécables ajoutés par l'extension
** Beta - Colorer les textes traités en rouge
