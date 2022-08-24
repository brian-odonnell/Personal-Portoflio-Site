<?php
/**
 * Template Name: Page (Default)
 * Description: Page template
 *
 */

	get_header();
?>

<div class="row">
	
	<div class="col-12">
		<?php the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>
			
			<h1><?php the_title(); ?></h1>

			<p>This is page.php</p>
			
			<?php the_content(); ?>

		</div>
					
	</div>
			
</div>



<!-- <a class="twitter-timeline" href="https://twitter.com/thekoeppler" data-tweet-limit="10" data-width="399" ></a>
<script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>


<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fhealthyinteractions&width=300&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=400" scrolling="yes" style="border:none; overflow:hidden; width:300px; height:400px; background: white; " allowtransparency="true" frameborder="0"></iframe>


<script src="https://platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/FollowCompany" data-id="1337" data-counter="bottom"></script> -->

<?php get_footer(); ?>