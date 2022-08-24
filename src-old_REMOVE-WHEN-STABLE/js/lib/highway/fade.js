import Highway from '@dogstudio/highway';
import { TimelineMax, CSSPlugin }  from 'gsap/all';

const plugins = [ CSSPlugin ];

export default class Fade extends Highway.Transition {
	out({from, to, done}) {
		new TimelineMax()
		.fromTo(from, .5, {autoAlpha: 1}, {autoAlpha: 0, delay: 5})

		setTimeout(function() {
			done();
		}, 500);
	}

	in({from, to, done}) {
		from.remove();

		new TimelineMax()
		.fromTo(to, .5, {autoAlpha: 0}, {autoAlpha: 1, delay: .5})

		// Setting the class on the body depending on what page
		// you are going to
		var currentPage = to.classList[0] + '-page';
		var previousPage = from.classList[0] + '-page';
		if (to.classList[0].length > 0) {
			$('body').removeClass(previousPage);
			$('body').addClass(currentPage);
		}

		// Initializes Particles.js if going to the Homepage
		if ($('body').hasClass('home-page')) {
			particlesJS.load('particles-js', 'json/particles-config.json', function() {
				// console.log('Particles.js successfully loaded');
			});
		}

		done();
	}
}
