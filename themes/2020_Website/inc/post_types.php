<?php 

//example of a custom taxonomy
function create_news_taxonomy() {
    register_taxonomy(
        'news-category',
        'news',
        array(
            'label' => __( 'News Categories' ),
            'rewrite' => array( 'slug' => 'news-category' ),
            'hierarchical' => true,
            'show_ui'       => true,
            'show_in_rest'  => true,
            'has_archive'   => true,
        )
    );
}
add_action( 'init', 'create_news_taxonomy' );


// example of a custom post type
function create_news_posttype() { 
    register_post_type( 'news',
        // CPT Options
        array(
            'labels' => array(
                'name'          => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => array('slug' => 'news'),
            'show_in_rest'  => true, 
            'menu_position' => 20,
            'supports'      => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_news_posttype' );