<?php
/**
 * Custom product card for Flatsome — with quantity + AJAX add to cart
 */
defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) return;
?>

<div <?php wc_product_class( 'product-card-wrapper col', $product ); ?>>
    <div class="product-card">
    <a href="<?php echo esc_url( get_permalink() ); ?>" class="product-card__image-wrap">
        <?php echo woocommerce_get_product_thumbnail( 'woocommerce_thumbnail' ); ?>
    </a>

    <div class="product-card__body">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="product-card__title">
            <?php echo get_the_title(); ?>
        </a>
        <span class="product-card__price"><?php echo $product->get_price_html(); ?></span>

        <?php if ( $product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock() ) : ?>
       	<div class="product-card__qty">
            <button class="qty-btn qty-minus" type="button">&#8722;</button>
            <input type="number" class="qty-input" value="1" min="1" max="..." />
            <button class="qty-btn qty-plus" type="button">&#43;</button>
        </div>

        <button class="product-card__atc button alt"
                data-product-id="<?php echo esc_attr( $product->get_id() ); ?>"
                data-product-name="<?php echo esc_attr( get_the_title() ); ?>">
            <?php esc_html_e( 'Add to Cart', 'woocommerce' ); ?>
        </button>
        <?php else : ?>
            <?php echo woocommerce_template_loop_add_to_cart(); ?>
        <?php endif; ?>
    </div>
</div>
</div>