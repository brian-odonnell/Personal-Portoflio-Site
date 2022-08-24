<?php
/**
 * The template for displaying Comments.
 */

	/*
	* If the current post is protected by a password and
	* the visitor has not yet entered the password we will
	* return early without loading the comments.
	*/
	if ( post_password_required() ) {
		return;
	}
?>

<div id="comments">

	<?php if ( comments_open() && ! have_comments() ) : ?>
		<h2>No Comments yet!</h2>
	<?php endif; ?>

	<?php if ( have_comments() ) : ?>

		<h2>
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					echo('One reply to &ldquo;' . get_the_title() . '&rdquo;');
				} else { 
					echo($comments_number . ' replies to &ldquo;' . get_the_title() . '&rdquo;');
				}
			?>
		</h2>
		
		<ol class="commentlist">
			<?php
				$args = array(
				   // args here
				);

				// The Query
				$comments_query = new WP_Comment_Query;
				$comments = $comments_query->query( $args );

				// Comment Loop
				if ( $comments ) {
					foreach ( $comments as $comment ) {
						echo '<p>' . $comment->comment_content . '</p>';
					}
				} else {
					echo 'No comments found.';
				}
			?>
		</ol>
		 

	<?php

	/* If there are no comments and comments are closed, let's leave a little note 
	 * But we don't want the note on pages or post types that do not support comments.
	 */
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		
		<h2 id="comments-title" class="nocomments">Comments are closed.</h2>
		
	<?php endif;

	// Show Comment Form
	comment_form();

	?>
</div>