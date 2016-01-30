
<?php query_posts('p=28'); ?>
	<?php while (have_posts()) : the_post(); ?>
	<div class="row">
		<div class="column">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php endwhile;?>
		</div>
	</div>