<?php
/**
 * Template Name: Single
 * Template Post Type: post, page
 * Description: A custom template for the Bengal Tree Foundation Blog details page.
 */
get_header();
?>

<!-- Page Banner or Header -->
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

<!-- Page Content Section -->
<div class="container py-5">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="post-content">
        <div class="row p_title"><div class="offset-lg-6 col-lg-6"><h1 class="post-title"><?php the_title(); ?></h1></div></div>
        <div class="row p_details"><?php the_content(); ?></div>
        
      </div>
    </article>

    <?php //comments_template(); ?>

  <?php endwhile; else : ?>
    <p><?php esc_html_e('Sorry, no post found.', 'BTFtheme'); ?></p>
  <?php endif; ?>
</div>

 <div class="others_product">
  <div class="container">
    <div class="section-heading">
      <h2>Related Products</h2>
    </div>
    <div class="row">
      <div class="product-slider">

        <?php
        global $product;

        if (!$product) {
            $product = wc_get_product(get_the_ID());
        }

        if ($product) {
            $related_product_ids = wc_get_related_products($product->get_id(), 10); // Get up to 10 related products

            foreach ($related_product_ids as $related_product_id) {
                $related_product = wc_get_product($related_product_id);
                $product_link = get_permalink($related_product_id);
                $product_image = get_the_post_thumbnail_url($related_product_id, 'medium');
                $product_title = $related_product->get_name();
                $product_price = $related_product->get_price_html();
        ?>

          <div class="product-item">
            <div class="s_details">
              <div class="p_img">
                <a href="<?php echo esc_url($product_link); ?>">
                  <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>">
                </a>
              </div>
              <div class="p_detail">
                <h4><?php echo esc_html($product_title); ?></h4>
                <h5><?php echo wp_kses_post($product_price); ?></h5>
              </div>
              <div class="s_cart">
                <a href="?add-to-cart=<?php echo esc_attr($related_product_id); ?>" class="add-to-cart-link">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              </div>
            </div>
          </div>

        <?php
            }
        } else {
            echo '<p>No related products found.</p>';
        }
        ?>

      </div>
    </div>
  </div>
</div>




        


<script>
jQuery(document).ready(function($){
    $('.product-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        responsive: [
            { breakpoint: 992, settings: { slidesToShow: 3 } },
            { breakpoint: 768, settings: { slidesToShow: 2 } },
            { breakpoint: 576, settings: { slidesToShow: 1 } }
        ]
    });
});
</script>

<?php get_footer(); ?>