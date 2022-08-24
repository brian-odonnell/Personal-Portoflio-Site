<?php 

function register_acf_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'slider_block',
        'title'             => __('Slider Block'),
        'description'       => __('A custom slider block.'),
        'render_template'   => 'template-parts/block-slider.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        //'keywords'          => array( 'testimonial', 'quote' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}