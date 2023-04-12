<?php 
add_action( 'init', 'ppm_quickstart_theme_custom_post' );
function ppm_quickstart_theme_custom_post() {
	register_post_type( 'cpt', [
        'labels' => [
            'name' => __( 'CPTs' ),
            'singular_name' => __( 'CPT' ),
            'add_new_item' => __( 'Add New CPT' )
        ],
        'public' => false,
        'show_ui' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
    ]);
	
    
	register_taxonomy('cpt_cat', 'cpt', [
        'hierarchical' => true,
        'label' => 'CPT Category',
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite' => [
            'slug' => 'event-category',
            'with_front' => true
        ]
    ]);
}