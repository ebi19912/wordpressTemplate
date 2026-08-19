<?php
/**
 * Template Name: Google Store Design
 *
 * A custom page template that mimics the Google Store UI using WooCommerce products.
 */

get_header(); ?>

<div class="google-store-container">

    <!-- Glassmorphism Header specific to this template layout -->
    <header class="gs-header">
        <div class="gs-header-logo">
            <svg width="74" height="24" viewBox="0 0 74 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.7 19.3c-2.4 0-4.6-.9-6.3-2.5C1.7 15.2.8 13 .8 10.4S1.7 5.7 3.4 4C5.1 2.4 7.3 1.5 9.7 1.5c2.7 0 5 .9 6.7 2.7l-1.9 1.9c-1.3-1.3-3-2-4.8-2-1.9 0-3.6.7-4.9 2-1.3 1.3-2 3.1-2 5.3 0 2.2.7 4 2 5.3 1.3 1.3 3 2 4.9 2 2.2 0 4-.7 5.3-2.2.9-1 1.4-2.5 1.5-4.4H9.7v-2.7h8.8c.1.5.2 1.1.2 1.8 0 2.6-.9 4.9-2.5 6.5-1.7 1.7-4 2.7-6.5 2.7zM27 19.3c-2.6 0-4.9-1.9-4.9-4.9 0-3 2.2-4.9 4.9-4.9 2.6 0 4.9 1.9 4.9 4.9 0 3-2.2 4.9-4.9 4.9zm0-2.6c1.2 0 2.1-.9 2.1-2.3s-.9-2.3-2.1-2.3-2.1.9-2.1 2.3.9 2.3 2.1 2.3zm10.7 2.6c-2.6 0-4.9-1.9-4.9-4.9 0-3 2.2-4.9 4.9-4.9 2.6 0 4.9 1.9 4.9 4.9 0 3-2.2 4.9-4.9 4.9zm0-2.6c1.2 0 2.1-.9 2.1-2.3s-.9-2.3-2.1-2.3-2.1.9-2.1 2.3.9 2.3 2.1 2.3zm10.4 2.6c-2 0-3.8-1-4.7-2.6l2.3-1c.6 1.1 1.6 1.6 2.5 1.6 1.1 0 2.1-.6 2.6-1.5l.2-.3-2.6-3.2c-1.3 1.3-2.9 2-4.7 2-2.3 0-4.2-1.8-4.2-4.4s1.9-4.4 4.2-4.4c1.7 0 3.2.9 4 2.2l.2-.1V9.8h2.6v9c0 2.3-1.8 4.2-4.2 4.2h-.2zm-.3-2.4c1.1 0 2.1-.7 2.4-1.7l-3.3-3.9c-.3.6-.5 1.2-.5 1.9 0 1.9 1.3 3.7 3.3 3.7h-.1v.1h-1.8zm11.3 2.1h-2.7V1.8h2.7v17.2zm7.6.3c-1.8 0-3.3-1-4-2.5l2.4-1c.5 1 1.3 1.5 2.2 1.5 1.1 0 1.9-.6 2.4-1.5l.2-.3-3.6-4.5c-1.1 1.2-2.6 1.9-4.3 1.9-2.4 0-4.4-1.9-4.4-4.6 0-2.6 1.9-4.6 4.4-4.6 1.7 0 3.2.7 4.1 1.8l.2-.2v-1.4h2.5v10.1c0 2.3-1.9 4.3-4.3 4.3h-.1v.1h-1.8zm-.2-2.4c1.1 0 2.1-.7 2.4-1.7l-3.6-4.4c-.4.5-.6 1.1-.6 1.8 0 1.9 1.3 3.6 3.2 3.6h-.1v.1h-1.3z" fill="#5f6368"/>
            </svg>
        </div>
        <nav class="gs-header-nav">
            <a href="#">Phones</a>
            <a href="#">Earbuds</a>
            <a href="#">Watches</a>
            <a href="#">Smart Home</a>
            <a href="#">Accessories</a>
        </nav>
    </header>

    <main class="gs-main-content">
        <h1 class="gs-section-title"><?php echo get_the_title(); ?></h1>

        <div class="gs-product-grid">
            <?php
            // Fetch WooCommerce products using standard functions per memory guidelines
            $args = array(
                'status' => 'publish',
                'limit' => -1, // Get all for this demo, usually paginated
            );
            $products = wc_get_products( $args );

            if ( ! empty( $products ) ) :
                foreach ( $products as $product ) :
                    $product_id = $product->get_id();
                    $product_url = $product->get_permalink();
                    $product_image = wp_get_attachment_image_url( $product->get_image_id(), 'google-store-product' );
                    // Fallback image if none exists
                    if ( ! $product_image ) {
                        $product_image = wc_placeholder_img_src();
                    }
                    ?>

                    <div class="gs-product-card">
                        <div class="gs-badge-container">
                            <?php if ( $product->is_on_sale() ) : ?>
                                <span class="gs-badge">On Sale</span>
                            <?php endif; ?>
                        </div>

                        <a href="<?php echo esc_url( $product_url ); ?>">
                            <img src="<?php echo esc_url( $product_image ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" class="gs-product-image">
                        </a>

                        <div class="gs-swatches">
                            <!-- Dummy swatches for UI representation -->
                            <div class="gs-swatch" style="background-color: #f1f3f4;"></div>
                            <div class="gs-swatch" style="background-color: #202124;"></div>
                            <div class="gs-swatch" style="background-color: #dae3cb;"></div>
                        </div>

                        <h2 class="gs-product-title">
                            <a href="<?php echo esc_url( $product_url ); ?>"><?php echo esc_html( $product->get_name() ); ?></a>
                        </h2>

                        <div class="gs-product-desc">
                            <?php
                            // Get a short excerpt
                            $short_desc = $product->get_short_description();
                            if ( $short_desc ) {
                                echo wp_kses_post( wp_trim_words( $short_desc, 15 ) );
                            } else {
                                echo 'High quality product available now.';
                            }
                            ?>
                        </div>

                        <div class="gs-product-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>

                        <div class="gs-product-actions">
                            <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="gs-btn gs-btn-outline" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                                <?php echo esc_html( $product->add_to_cart_text() ); ?>
                            </a>
                        </div>
                    </div>

                <?php
                endforeach;
            else :
                echo '<p>No products found.</p>';
            endif;
            ?>
        </div>
    </main>

</div>

<?php get_footer(); ?>
