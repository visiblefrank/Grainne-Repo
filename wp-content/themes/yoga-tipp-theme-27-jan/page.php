<?php
/*
Template Name: Page
*/
?>

<?php get_header(); ?>
	<div class="row page-wrap collapse">
		<div class="small-12 medium-9 columns medium-offset-3" id="content" role="main">
			
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
	</div> <!-- row -->
	<div class="row">
		<?php get_sidebar(); ?>
	</div> <!-- row -->
	
