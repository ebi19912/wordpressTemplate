<?php
/**
 * Theme functions and definitions
 */

// Define custom image size for Bento Grid
function bento_custom_image_sizes() {
    add_image_size( 'bento-custom-size', 600, 600, true ); // 600x600 cropped
}
add_action( 'after_setup_theme', 'bento_custom_image_sizes' );

// Enqueue styles conditionally for the Bento Grid template
function bento_enqueue_scripts() {
    // Only load the CSS if we are on the specific page template
    if ( is_page_template( 'template-bento.php' ) ) {
        wp_enqueue_style(
            'bento-style',
            get_stylesheet_directory_uri() . '/bento-style.css',
            array(), // dependencies
            '1.0.0'  // version
        );
    }
}
add_action( 'wp_enqueue_scripts', 'bento_enqueue_scripts' );
