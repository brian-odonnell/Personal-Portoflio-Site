<?php
/**
 * Template Name: Wordle
 * Description: Page template
 *
 */

	get_header();
?>

<?php
	$jsonUrl = 'wp-content/themes/2020_Website/assets/json/words.json';
	$json = file_get_contents($jsonUrl);
	$words = json_decode($json, true);
?>

<main data-router-wrapper>
	<div data-router-view="wordle" id="page" class="wordle">
		<div class="container">
			<div class="row">
				<div class="wordle__container">
					<div class="wordle__field-container wordle__field-container--correct">
						<input type="text" id="letter-1" class="js-textField"/>
						<input type="text" id="letter-2" class="js-textField"/>
						<input type="text" id="letter-3" class="js-textField"/>
						<input type="text" id="letter-4" class="js-textField"/>
						<input type="text" id="letter-5" class="js-textField"/>
						<button class="js-button" id="submit">Check</button>
					</div>

					<div class="wordle__field-container wordle__field-container--present">
						<input type="text" id="letter-1" class="js-textField"/>
						<input type="text" id="letter-2" class="js-textField"/>
						<input type="text" id="letter-3" class="js-textField"/>
						<input type="text" id="letter-4" class="js-textField"/>
						<input type="text" id="letter-5" class="js-textField"/>
						<button class="js-button" id="submit">Check</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
