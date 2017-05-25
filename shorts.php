<?php
/*
TOC: 
1. Add category term to body_class
2. Add my account link to menu
*/




//     Add category term to body_class

function woo_custom_taxonomy_in_body_class( $classes ){
  if( is_singular( 'product' ) )
  {
    $custom_terms = get_the_terms(0, 'product_cat');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'product_cat_' . $custom_term->slug;
      }
    }
  }
  return $classes;
}
add_filter( 'body_class', 'woo_custom_taxonomy_in_body_class' );



 
//      Add my account link to menu

function wpsnippet_myaccount() {

    if ( is_user_logged_in() ) { ?>
    
    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
 
    <?php } else { ?>

    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
    
    <?php } 
}
add_action( 'storefront_header', 'wpsnippet_myaccount', 51 );







