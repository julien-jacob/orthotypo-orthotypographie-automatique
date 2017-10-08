(function( $ ) {
	'use strict';

	$(function() {
		// Hide error javascript box
		$(".error-js-disable").hide();
	});

	$( window ).load(function() {

		tabInit();

		/**
		 * Initialise admin tab and menu
		 */
		function tabInit() {
			$($(".nav-tab.nav-tab-active").attr("href")).show();
			$(".nav-tab").click(function() {
				$(".admin-tab").hide();
				$(".nav-tab").removeClass("nav-tab-active");
				$($(this).attr("href")).show();
				$(".nav-tab[href='" + $(this).attr("href") + "']").addClass("nav-tab-active");
			});
		}
	});

})( jQuery );
