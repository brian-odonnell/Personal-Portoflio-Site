<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font Awesome CDN link -->
	<script src="https://kit.fontawesome.com/01ecc35421.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


	<?php wp_head(); ?>
</head>

<!-- Add line below back in to get WP body classes -->
<!-- <body body_class(); > -->
<body>

<?php wp_body_open(); ?>

<a href="#main" class="sr-only sr-only-focusable">Skip to main content</a>

<div id="wrapper">

	<header class="main">
		<div class="container">
			<div class="nav" data-aos="fade-down">
				<div class="nav__logo">
					<a href="/" alt="Home" class="internal-link">
						<img src="/wp-content/themes/2020_Website/assets/images/logos/alt-logo-light.svg" alt="Logo">
					</a>
				</div>
				<div class="nav__list">
					<ul class="list">
						<li><a href="/about" id="about" class="nav-link underline internal-link">About</a></li>
						<li><a href="/work" id="work" class="nav-link underline internal-link">Work</a></li>
						<li><a href="/photography" id="photography" class="nav-link underline internal-link">Photography</a></li>
						<li><span class="nav-link underline open-form-js">Contact</span></li>
					</ul>
				</div>
				<div class="nav__mobile-icon open-nav-js">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</div>
	</header>

	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader__animation">
			<div class="loader">
				<hr/><hr/><hr/><hr/>
			</div>
		</div>

		<div class="preloader__cover preloader__cover--left"></div>
		<div class="preloader__cover preloader__cover--right"></div>
	</div> -->

	<!-- Contact Form Popup -->
	<div class="form__cover state-closed hidden"></div>
	<div class="form__popup hidden state-closed">
		<div class="form__container">
			<div class="form__close close-form-js">
				<span class="circle"></span>
				<span class="line-1"></span>
				<span class="line-2"></span>
			</div>
			<div class="contact-form">
				<h2>Message Me</h2>
				<?php echo do_shortcode('[contact-form-7 id="72" title="Contact"]'); ?>
			</div>
		</div>
	</div>

	<!-- Mobile Nav -->
	<div class="mobile-nav mobile-nav-js state-closed">
		<div class="container mobile-nav__button-container">
			<!-- <div class="mobile-nav__close">
				<div class="icon close-nav-js"><i class="fas fa-times"></i></div>
			</div> -->
			<div class="mobile-nav__button">
				<div class="mobile-nav__close close-nav-js">
					<span class="circle"></span>
					<span class="line-1"></span>
					<span class="line-2"></span>
				</div>
			</div>
		</div>

		<div class="mobile-nav__container">
			<ul class="mobile-nav__list">
				<li><a href="/" id="home" class="nav-link internal-link">Home</a></li>
				<li><a href="/about" id="about" class="nav-link internal-link">About</a></li>
				<li><a href="/work" id="work" class="nav-link internal-link">Work</a></li>
				<li><a href="/photography" id="photography" class="nav-link internal-link">Photography</a></li>
				<li><span class="nav-link open-form-js">Contact</span></li>
			</ul>

			<div class="mobile-nav__social">
				<div class="social">
					<a href="https://www.instagram.com/brianodo/" alt="Instagram" target="_blank">
						<span class="social__icon"><i class="fab fa-instagram"></i></span>
					</a>
				</div>
				<div class="social">
					<a href="https://twitter.com/brianodo" alt="Twitter" target="_blank">
						<span class="social__icon"><i class="fab fa-twitter"></i></span>
					</a>
				</div>
				<div class="social">
					<a href="https://www.flickr.com/photos/brianodo/" alt="Instagram" target="_blank">
						<span class="social__icon"><i class="fab fa-flickr"></i></span>
					</a>
				</div>
				<div class="social">
					<a href="https://www.linkedin.com/in/brianodo/" alt="LinkedIn" target="_blank">
						<span class="social__icon"><i class="fab fa-linkedin"></i></span>
					</a>
				</div>
				<div class="social">
					<a href="https://codepen.io/brianodo" alt="CodePen" target="_blank">
						<span class="social__icon"><i class="fab fa-codepen"></i></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<main id="main" class="">
