<?php
/**
 * Theme functions and definitions.
 */

/**
 * Enqueue scripts and styles.
 */
function google_store_child_enqueue_styles() {
    // Enqueue parent theme style
    wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' );

    // Enqueue our custom google store styles only if we are using the custom template
    if ( is_page_template( 'template-google-store.php' ) ) {
        wp_enqueue_style(
            'google-store-style',
            get_stylesheet_directory_uri() . '/google-store-style.css',
            array( 'storefront-style' ),
            wp_get_theme()->get('Version')
        );
    }
}
add_action( 'wp_enqueue_scripts', 'google_store_child_enqueue_styles' );

/**
 * Register custom image sizes for the Google Store template.
 */
function google_store_child_setup() {
    // Add custom image size for products in the grid
    add_image_size( 'google-store-product', 600, 600, false ); // 600x600, soft crop (proportional)
}
add_action( 'after_setup_theme', 'google_store_child_setup' );
