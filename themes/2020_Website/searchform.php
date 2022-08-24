<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				<input type="text" name="s" id="s" class="form-control" placeholder="<?php _e( 'Search', 'hanson-theme' ); ?>" />
				<button type="submit" class="btn btn-primary" name="submit" id="searchsubmit"><?php _e( 'Search', 'hanson-theme' ); ?></button>			 
			</div>
		</div>
	</div>
</form>