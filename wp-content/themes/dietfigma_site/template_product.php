<?php
/**
 * Template Name: All Products Page
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
              <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>

      <section class="shop_page py-5">
        <div class="container">
            <h2>Our Products</h2>
            <div class="row">
                <?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
);
$loop = new WP_Query($args);

if ($loop->have_posts()) {
    echo '<div class="row">'; // Start grid row

    while ($loop->have_posts()) : $loop->the_post();
        global $product;
        ?>

        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <div class="s_details">
                <div class="p_img">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>">
                    </a>
                </div>
                <div class="p_detail">
                    <h4><?php the_title(); ?></h4>
                    <h5><?php echo $product->get_price_html(); ?></h5>
                </div>
                <div class="s_cart">
                    <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" 
                       data-quantity="1"
                       class="button add_to_cart_button ajax_add_to_cart"
                       data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
                       data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
                       aria-label="<?php echo esc_attr( $product->add_to_cart_description() ); ?>"
                       rel="nofollow">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php
    endwhile;

    echo '</div>'; // End row
} else {
    echo '<p>No products found</p>';
}

wp_reset_postdata();
?>
            </div>
        </div>
      </section>


<?php get_footer(); ?>