<?php
/**
 * Template Name: Bento Grid Layout
 *
 * A custom page template for displaying WooCommerce products in a Bento grid style.
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="bento-wrapper">
        <header class="bento-header">
            <h1 class="bento-title">REIMAGINED COMFORT</h1>
        </header>

        <div class="bento-grid-container">
            <?php
            // Fetch WooCommerce products
            $args = array(
                'status' => 'publish',
                'limit'  => 6, // Let's fetch 6 products for a nice grid
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $products = wc_get_products( $args );

            if ( ! empty( $products ) ) {
                $count = 0;
                foreach ( $products as $product ) {
                    $count++;

                    // Determine grid item classes for asymmetric layout
                    // For example, make the first item larger (2x2)
                    $item_class = 'bento-item';
                    if ( $count === 1 ) {
                        $item_class .= ' bento-item-large'; // grid-column: span 2; grid-row: span 2;
                    } elseif ( $count === 2 || $count === 3 ) {
                        $item_class .= ' bento-item-medium';
                    } else {
                        $item_class .= ' bento-item-small';
                    }

                    $product_id = $product->get_id();
                    $product_name = $product->get_name();
                    $product_price = $product->get_price_html();
                    $product_image = $product->get_image( 'bento-custom-size' ); // Custom image size
                    $checkout_url = wc_get_checkout_url() . '?add-to-cart=' . $product_id;

                    ?>
                    <article class="<?php echo esc_attr( $item_class ); ?>">
                        <div class="bento-image-wrapper">
                            <?php echo $product_image; ?>
                        </div>

                        <div class="bento-content-overlay">
                            <h2 class="bento-product-title"><?php echo esc_html( $product_name ); ?></h2>
                            <span class="bento-product-price"><?php echo wp_kses_post( $product_price ); ?></span>

                        </div>

                        <a href="<?php echo esc_url( $checkout_url ); ?>" class="bento-add-to-cart-btn" aria-label="Add to cart">
                            +
                        </a>

                        <?php if ( $count === 1 ) : ?>
                            <div class="bento-barcode">
                                <div class="barcode-bars">||| | |||| || | || |||</div>
                                <span class="barcode-text">(01)01234567890123</span>
                            </div>
                        <?php endif; ?>
                    </article>
                    <?php
                }
            } else {
                echo '<p>' . esc_html__( 'No products found.', 'textdomain' ) . '</p>';
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
