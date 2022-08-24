<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load non-repeater values
$id = 'slick-slider-' . $block['id'];
$slider_type = get_field('slider_type'); 
$background_color = get_field('background_color');

?>
<div id="<?php echo esc_attr($id); ?>">
    
    <div class="slick-slider <?php echo $slider_type; ?>"> 

        <?php 
        // check if the repeater field has rows of data
        if ( have_rows('slides') ):  

            // loop through the rows of data
            while ( have_rows('slides') ) : the_row();
                
                $slide_image = get_sub_field('slide_image');
                $slide_heading = get_sub_field('slide_heading');
                $slide_copy = get_sub_field('slide_copy');
                $button_copy = get_sub_field('button_copy');
                $button_url = get_sub_field('button_url'); 

                ?>

                <div class="slide">
                    <div class="slide__card" style="background-color:<?php echo $background_color; ?>">

                        <?php 

                        if ($button_url): ?>
                            <a href="$button_url" class="slide__image-wrapper">
                                <span style="background-image: url('<?php echo $slide_image;?>');"></span>
                            </a>
                        <?php else : ?>
                            <div class="slide__image-wrapper">
                                <span style="background-image: url('<?php echo $slide_image;?>');"></span>
                            </div>
                       <?php endif; ?> 

                       <div class="slide__detail">
                            
                            <?php if ($slide_heading): ?>
                                <h5><?php echo $slide_heading; ?></h5>
                            <?php endif; ?>

                            <?php if ($slide_copy): ?>
                                <p><?php echo $slide_copy; ?></p>
                            <?php endif; ?>

                            <?php if ($button_copy && $button_url): ?>
                                <a href="<?php echo $button_url;?>" class="btn btn-primary"><?php echo $button_copy;?></a>
                            <?php endif; ?>
                                
                        </div> 

                    </div>
                </div>

            <?php endwhile; 

        else :

            // no rows found

        endif;
        ?>

    </div>

</div>