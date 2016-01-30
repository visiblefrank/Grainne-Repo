<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Sacramento|Days+One|Passion+One' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class('antialiased'); ?> id="home">

<header class="contain-to-grid">
	<!-- Starting the Top-Bar -->
	<nav class="top-bar" data-topbar>
	    <ul class="title-area">
	        <li class="name">
	        	
	        </li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	    </ul>
	    <section class="top-bar-section">
	    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="right">%3$s</ul>',
	            'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li',
	                'menu_type' => 'main-menu'
	            ) ),
	        ) );
	    ?>
	   
	    </section>
	</nav>
	<!-- End of Top-Bar -->

</header>

<!-- Start the main container -->
<div class="container" role="document">
	<section id="logo" class="row">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<div id="title" class="flower-orange-glass"><h1 class="home-title">Grainne <br> McLaughlin <br>Yoga</h1></div>
						<div id="yantra" class="flower-orange-glass"><img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/12/The_Sri_Yantra-160.svg"></div>
					</a>
<!--
						<div id="tag">
							<h3 class="white-glass">Yoga in County Tipperary, Ireland.</h3>
							<div class="dark-glass contact-head">
								<a href="tel:00353868518321">086 851 8321</a><br>
								<a href="mailto:grainne@yoga.ie">grainne@grainnemcloughlin.ie</a>
							</div>
						</div>
-->
				
	</section>
