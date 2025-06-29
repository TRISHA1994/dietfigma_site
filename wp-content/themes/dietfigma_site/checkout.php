<?php
/**
 * Template Name: Custom Checkout Page
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
              <li class="breadcrumb-item active" aria-current="page">Product Details</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
<div class="container">
  <h1 class="my-4">Checkout custom template</h1>

  <?php
  // Ensure WooCommerce is active
  if ( class_exists( 'WooCommerce' ) ) {
      // Display the checkout shortcode
      echo do_shortcode('[woocommerce_checkout]');
  } else {
      echo '<p>WooCommerce is not active.</p>';
  }
  ?>
</div>

<?php get_footer(); ?>