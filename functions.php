function disable_pingback( &$links ) {
  foreach ( $links as $l => $link )
    if ( 0 === strpos( $link, get_option( 'home' ) ) )
      unset($links[$l]);
}
add_action( 'pre_ping', 'disable_pingback' );

function deregister_qjuery() { 
  if ( !is_admin() ) {
    wp_deregister_script('jquery');
  }
} 
add_action('wp_enqueue_scripts', 'deregister_qjuery');

remove_action( 'wp_head', 'wlwmanifest_link' ) ;
remove_action( 'wp_head', 'wp_generator' ) ;
