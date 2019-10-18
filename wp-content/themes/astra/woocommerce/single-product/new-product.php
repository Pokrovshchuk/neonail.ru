<?php
/**
 * Product loop new-product
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/new-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ($product->is_new_product()) : ?>

    <?php echo apply_filters('woocommerce_new_product', '<span class="new-product">' . esc_html__('New!', 'woocommerce') . '</span>', $post, $product); ?>

<?php endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
