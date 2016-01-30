	</div><!-- Row End -->
</div><!-- Container End -->

<div class="full-width footer-widget">
	<div class="row">
		<?php dynamic_sidebar("Footer"); ?>
	</div>
</div>

<footer class="full-width tri-drk-red-solid main-footer" role="contentinfo">
	<section id="trust" class="section row">
		<div class="trust-txt column medium-7 small-centered">
			<q>Move from a place of knowing within you rather than as a result of adaptation to outer experience. Let go of your assumptions and need to control life’s creative process.</q>
			
			<cite>Swami Niranjananda Saraswati</cite>
		</div>

	</section>

<!--
	<div class="row">
		<div class="large-12 columns">
			<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => false, 'menu_class' => 'inline-list')); ?>
		</div>
	</div>
-->
	<div class="row love-reverie">
		<div class="large-12 columns">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
		</div>

</footer>

<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
	
</body>
</html>

