<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/css/app.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/css/style.css' );

}
?>
<?php

if( ! function_exists( 'reverie_enqueue_style' ) ) {
	function reverie_enqueue_style()
	{
		
		// Register the main style
		wp_register_style( 'reverie-child-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
		
		wp_enqueue_style( 'reverie-child-stylesheet' );
		
	}
}
add_action( 'wp_enqueue_scripts', 'reverie_enqueue_style' );

$sidebars = array('search-widget');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'search-widget',
        'before_widget' => '<article id="search-bar" class="widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    
    
}

?>