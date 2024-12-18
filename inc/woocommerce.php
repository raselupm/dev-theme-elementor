<?php

function ppm_quickstart_woocommerce_setup() {
    add_theme_support('woocommerce', [
        'thumbnail_image_width' => 800,
        'single_image_width'    => 1200
    ]);

    //add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ppm_quickstart_woocommerce_setup' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'ppm_quickstart_woocommerce_wrapper_before' ) ) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function ppm_quickstart_woocommerce_wrapper_before() {
        ?>
        <div class="content-block">
            <div class="elementor-section elementor-section-boxed">
                <div class="elementor-container">
                    <div class="internal-content-wrap ppm-woocommerce-wrap">
                        <main id="primary" class="site-main">
        <?php
    }
}
add_action( 'woocommerce_before_main_content', 'ppm_quickstart_woocommerce_wrapper_before' );

if ( ! function_exists( 'ppm_quickstart_woocommerce_wrapper_after' ) ) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function ppm_quickstart_woocommerce_wrapper_after() {
        ?>
                        </main><!-- #main -->
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
add_action( 'woocommerce_after_main_content', 'ppm_quickstart_woocommerce_wrapper_after' );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

function ppm_disable_woo_commerce_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('init', 'ppm_disable_woo_commerce_sidebar');