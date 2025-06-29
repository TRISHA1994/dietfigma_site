<?php
function mytheme_enqueue_assets() {
    // CSS
    //wp_enqueue_style('main-style', get_stylesheet_uri()); // style.css
    wp_enqueue_style('custom-style1', get_template_directory_uri() . '/assets/css/style.css');
    // wp_enqueue_style('custom-style2', get_template_directory_uri() . '/assets/css/bootstrap-icons.css');
   
    // wp_enqueue_style('custom-style4', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    
    // JS
    // wp_enqueue_script('custom-script2', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
    // wp_enqueue_script('custom-script3', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    // Google Fonts CDN
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap', false);

    // bs-min CDN
    wp_enqueue_style('bootstrap-min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', false);

     // bs-min CDN
    wp_enqueue_style('all-css', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css', false);

     wp_enqueue_style('slick-min--css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false);

     wp_enqueue_style('slick-min--css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', false);

     // bs-min CDN
    // wp_enqueue_style('js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', false);


    wp_enqueue_script(
    
        'jquery',
    'https://code.jquery.com/jquery-3.6.0.min.js',
    array('jquery'),
    null,
    true
);
    wp_enqueue_script(
    
        'bootstrap-js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    array('jquery'),
    null,
    true
);

wp_enqueue_script(
    
        'slick-min-js',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
    array('jquery'),
    null,
    true
);



   
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
wp_enqueue_script('jquery');

// define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', true);
// define('WP_DEBUG_DISPLAY', false);


?>

