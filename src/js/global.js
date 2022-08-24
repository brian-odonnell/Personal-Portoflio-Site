import Swiper, { Navigation, Pagination } from 'swiper';

export const Global = class {

	contactFormSetup() {
		let popup = document.getElementsByClassName('form__popup')[0];
		let cover = document.getElementsByClassName('form__cover')[0];
		let body = document.body;
		let formTriggers = document.getElementsByClassName('open-form-js');

		for (let i = 0; i < formTriggers.length; i++) {
			formTriggers[i].addEventListener('click', function() {
				console.log('This is a test');
				if (popup.classList.contains('hidden')) {
					popup.classList.remove('hidden');
					cover.classList.remove('hidden');
					body.classList.add('noscroll');

					setTimeout(function() {
						popup.classList.remove('state-closed');
						cover.classList.remove('state-closed');
					}, 100);
				}
			});
		}

		document.getElementsByClassName('close-form-js')[0].addEventListener('click', function() {
			closeForm(popup, cover, body);
		})

		document.getElementsByClassName('form__cover')[0].addEventListener('click', function() {
			closeForm(popup, cover, body);
		})

		function closeForm(popup, cover, body) {
			if (!popup.classList.contains('hidden')) {
				popup.classList.add('state-closed');
				cover.classList.add('state-closed');
				body.classList.remove('noscroll');

				setTimeout(function() {
					popup.classList.add('hidden');
					cover.classList.add('hidden');
				}, 500);
			}
		}
	}

	activeNavLinkSetup() {
		let page = window.location.pathname;
		page = page.substring(1);
		let index = page.search('/');
		page = page.slice(0, index);

		if (document.getElementById(page)) {
			document.getElementById(page).classList.add('active');
		}
	}

	mobileNavControlsSetup() {
		let mobileNav = document.getElementsByClassName('mobile-nav-js')[0];
		let body = document.body;

		document.getElementsByClassName('open-nav-js')[0].addEventListener('click', function() {
			if (mobileNav.classList.contains('state-closed')) {
				mobileNav.classList.remove('state-closed');
				body.classList.add('noscroll');
			}
		})

		document.getElementsByClassName('close-nav-js')[0].addEventListener('click', function() {
			if (!mobileNav.classList.contains('state-closed')) {
				mobileNav.classList.add('state-closed');
				body.classList.remove('noscroll');
			}
		})
	}

	swiperSetup() {
		var swiper = new Swiper(".mySwiper--photography", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			modules: [Navigation],
		});

		var swiper = new Swiper(".mySwiper--work", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			pagination: {
				el: ".swiper-pagination",
			},
			modules: [Navigation, Pagination],
		});
	}

	/**
	 * Container Initialization
	 */
	init() {
		this.contactFormSetup();
		this.activeNavLinkSetup();
		this.mobileNavControlsSetup();
		this.swiperSetup();
	}
};

const global = new Global();
global.init();
