<?php
/*
Template Name: Page
*/
?>

<?php get_header(home); ?>

	<div class="small-12 columns" id="content" role="main">
	
	<div class="logo-title">
		<h1 class="home-title">Tipperary <br/> Yoga</h1>
<!-- 		<div class="yantra"><img src="http://127.0.0.1/yoga-tipp/wp-content/uploads/2015/11/sri-yantra.png"></div> -->
	</div>
		<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			
		</article>
	<?php endwhile; // End the loop ?>
	</div>
	<?php get_sidebar(); ?>
