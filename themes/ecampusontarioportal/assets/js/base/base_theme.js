/**
 * @file
 * Helpers for the base theme.
 *
 */

(function ($) {
	$(document).ready(function () {
		// Mobile Navigation
		var topnav = $("#primary-nav");
		var mobile_topnav = $("#mobile-nav-block");
		var mobile_share = $("#mobile-services-block");
		var topnavbtn = $(".main-nav .menu-913 a");
		var mobiletopnavbtn = $("#mobile-header-nav a");
		var topnavclose = topnav.find(".close_btn");
		var mobiletopnavclose = mobile_topnav.find(".close_btn");

		/*
	  topnav
	    .hide()
	    .css('top',0);
	    
	  mobile_topnav
	    .css('top',0);
	  */

		topnavclose.unbind().bind("click", function () {
			topnav.slideUp({ duration: 300, easing: "swing" });
		});

		topnavbtn
			.css("cursor", "pointer")
			.unbind()
			.bind("click", function (event) {
				event.preventDefault();
				if (topnav.is(":hidden")) {
					topnav.slideDown({ duration: 300, easing: "swing" });
				} else {
					topnav.slideUp({ duration: 300, easing: "swing" });
				}
			});

		mobiletopnavclose.unbind().bind("click", function () {
			mobile_topnav.slideUp({ duration: 300, easing: "swing" });
		});

		mobiletopnavbtn
			.css("cursor", "pointer")
			.unbind()
			.bind("click", function (event) {
				event.preventDefault();
				if (mobile_topnav.is(":hidden")) {
					mobile_share.hide(300);
					mobile_topnav.slideDown({ duration: 300, easing: "swing" });
				} else {
					mobile_topnav.slideUp({ duration: 300, easing: "swing" });
				}
			});

		// Smooth Scroll to named anchors

		$('a[href*="#"]')
			.not('[href="#"]')
			.click(function () {
				if (
					location.pathname.replace(/^\//, "") ===
						this.pathname.replace(/^\//, "") ||
					location.hostname === this.hostname
				) {
					var target = $(this.hash);
					target = target.length
						? target
						: $("[name=" + this.hash.slice(1) + "]");
					if (target.length) {
						$("html,body").animate(
							{
								scrollTop: target.offset().top,
							},
							800
						);
						return false;
					}
				}
			});
	});
})(jQuery);
