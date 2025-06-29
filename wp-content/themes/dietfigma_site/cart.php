<?php
/**
 * Template Name: Custom Cart Page
 * Template Post Type: page
 */
get_header();


?>
 <section class="breadcumb_area">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
              <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>

    <section class="cart my-5 py-5">
    <div class="container">
        <div class="row">
            <!-- Cart Table Left -->
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="cart-table">
                    <form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                    $_product = $cart_item['data'];
                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                                        $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
                                ?>
                                    <tr>
                                        <td><?php echo $_product->get_image([60, 80]); ?></td>
                                        <td>
                                            <?php echo $product_permalink ? '<a href="' . esc_url($product_permalink) . '">' . $_product->get_name() . '</a>' : $_product->get_name(); ?>
                                        </td>
                                        <td><?php echo wc_price($_product->get_price()); ?></td>
                                        <td>
                                            <?php
                                            echo woocommerce_quantity_input([
                                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value'   => $_product->get_max_purchase_quantity(),
                                                'min_value'   => 1,
                                            ], $_product, false);
                                            ?>
                                        </td>
                                        <td><?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?></td>
                                        <td>
                                            <a class="remove" href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>">
                                                <img src="../wp-content/uploads/2025/06/delete.png" alt="Remove">
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Update Cart Button -->
                        <div class="cart-actions mt-3">
                            <button type="submit" class="btn btn-primary" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
                                Update Cart
                            </button>
                            <?php do_action('woocommerce_cart_actions'); ?>
                            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Cart Summary Right -->
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="cart-summary">
                    <h2>Cart Total</h2>

                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item ) :
                        $_product = $cart_item['data'];
                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) :
                    ?>
                        <div class="summary-item">
                            <p><?php echo $_product->get_name(); ?></p>
                            <span>x <?php echo $cart_item['quantity']; ?></span>
                            <span><?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?></span>
                        </div>
                    <?php endif; endforeach; ?>

                    <div class="summary-item">
                        <p>Subtotal</p><span><?php wc_cart_totals_subtotal_html(); ?></span>
                    </div>

                    <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                        <div class="summary-item">
                            <p>Shipping</p><span><?php wc_cart_totals_shipping_html(); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="summary-item total">
                        <p>Total</p><span><?php wc_cart_totals_order_total_html(); ?></span>
                    </div>

                    <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="checkout-btn">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>