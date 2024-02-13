<?php
/**
 * Plugin Name: text reveal elementor Addon
 * Description: text reveal elementor Addon.
 * Version:     1.0.0
 * Author:      Roni Ravitz
 * Author URI:  https://roni-ravitz.com/
 * Text Domain: text-reveal-elementor-addon
 */

function register_text_reveal( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/text-reveal.php' );

	$widgets_manager->register( new \Elementor_text_reveal() );

}
add_action( 'elementor/widgets/register', 'register_text_reveal' );

// add_action( 'wp_enqueue_scripts', 'my_plugin_assets' );
// function my_plugin_assets() {
// // Styles
// wp_register_style( 'control-style', plugins_url( 'assets/css/control-style.css', __FILE__ ) );
// wp_enqueue_style( 'control-style' );

// // Scripts
// wp_register_script( 'control-script', plugins_url( 'assets/js/control-script.js', __FILE__ ) );
// wp_enqueue_script( 'control-script' );

// }

// function aos_css() {
//     ?>
//           <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
//     <?php
// }
// add_action('wp_head', 'aos_css');

// function aos_js() {
// 	?>
// 	  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
//   <script>
//     AOS.init();
//   </script>
// 	<?php
// }
// add_action( 'wp_footer', 'aos_js' );