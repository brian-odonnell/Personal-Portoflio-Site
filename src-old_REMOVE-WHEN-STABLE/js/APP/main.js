/**
 * @requires HBS
 */

import '../lib/transitions.js';
import '../lib/particles.min.js';
// import '../lib/aos.js';
import AOS from 'aos';

(function() {
	/**
	 * @exports APP.main
	 */
	var module = {};

	/**
	 * Global init code for the whole application
	 */
	module.init = function() {
		module.initPreloader();
		module.initNavControls();
		module.initContactFormControls();
		module.initParticles();
		module.initAOS();
	};

	module.initPreloader = function() {
		// Ends the preloader on initial page load
		endPreloader();

		// Starts and ends the preloader when clicking a link
		// with '.internal-link'
		$('.internal-link').on('click', function() {
			startPreloader();
			endPreloader();
		});

		// Runs when the back or forward button is clicked
		// (popstate changes)
		$(window).on('popstate', function() {
			startPreloader();
			endPreloader();
		});

		function startPreloader() {
			// Unhides the preloader and sets it back to opacity: 0;
			$('.preloader').removeClass('hidden');

			// Closes the preloader doors after 0.1s just to give the
			// preloader time to unhide
			setTimeout(function() {
				$('.preloader').removeClass('loaded');
			}, 100);

			// Fades in the loader animation after 0.5s
			setTimeout(function() {
				$('.loader').removeClass('state-hidden');
			}, 500);
		}

		function endPreloader() {
			// Fades out the loader animation after 0.25s
			setTimeout(function() {
				$('.loader').addClass('state-hidden');
			}, 1250);

			// Runs the preloader for 1.5s
			setTimeout(function() {
				$('.preloader').addClass('loaded');
			}, 1500);

			// Sets the preloader as hidden after 2s so the page
			// isn't rendering an opacity: 0; element
			setTimeout(function() {
				$('.preloader').addClass('hidden');
			}, 2000);
		}
	}

	module.initNavControls = function() {
		// Searches for active tab on page load
		setActive();

		// Runs any time a link is clicked
		$('a').on('click', function() {
			setActive();
		});

		// Runs when the back or forward button is clicked
		// (popstate changes)
		$(window).on('popstate', function() {
			setActive();
		});

		function setActive() {
			// After a 1sec delay it searches for '.work' and '.photography'
			// and sets them as active if found
			setTimeout(function() {
				$('.nav-link.active').removeClass('active');
				if ($('.work')[0]) {
					console.log('Work');
					$('#work').addClass('active');
				} else if ($('.photography')[0]) {
					console.log('Photography');
					$('#photography').addClass('active');
				}
			}, 1000);
		}
	}

	module.initContactFormControls = function() {
		$('.open-form-js').on('click', function() {
			if ($('.form__popup').hasClass('hidden')) {
				$('.form__popup').removeClass('hidden');
				$('.form__cover').removeClass('hidden');
				$('body').addClass('noscroll');

				setTimeout(function() {
					$('.form__popup').removeClass('state-closed');
					$('.form__cover').removeClass('state-closed');
				}, 100);
			}
		});

		$('.close-form-js').on('click', function() {
			closeForm();
		});

		$('.form__cover').on('click', function() {
			closeForm();
		})

		function closeForm() {
			if (!$('.form__popup').hasClass('hidden')) {
				$('.form__popup').addClass('state-closed');
				$('.form__cover').addClass('state-closed');
				$('body').removeClass('noscroll');

				setTimeout(function() {
					$('.form__popup').addClass('hidden');
					$('.form__cover').addClass('hidden');
				}, 500);
			}
		}
	}

	module.initParticles = function() {
		if ($('body').hasClass('home-page')) {
			particlesJS.load('particles-js', 'json/particles-config.json', function() {
				// console.log('Particles.js successfully loaded');
			});
		}
	}

	module.initAOS = function() {
		setTimeout(function() {
			AOS.init({
				once: true
			});
		}, 2000);
	}

	/**
	 * Initialize the app and run the bootstrapper
	 */
	$(document).ready(function() {
		module.init();
		HBS.initPage();
	});
	HBS.namespace('APP.main', module);
}());
