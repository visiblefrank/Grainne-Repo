<?php
/*
Template Name: Home
*/
?>

<?php get_header('home'); ?>
	<div id="homepage">
	
	
<!-- 	<div class="tri-drk-red"><h1>ijysdxdusdyg sdjy kj  ulcljsbjxckxjc xd <br> kdzh dkjysdbiuydiubydbku</h1></div> -->
	<section id="hero" class="row section collapse">
		
		<div class="column medium-12 large-9 large-offset-3">
			<div class="row">
				<div class="flower-orange-glass contact-head">
					<p><span> T </span><a href="tel:00353868518321">086 851 8321</a><br>
					<span> E </span><a href="mailto:grainne@topp-yoga.ie">grainne@grainnemclaughlin.ie</a></p>
				</div>
			</div>
			<div class="row collapse lt-green-glass">
				<div class="column medium-9">
					<h1>YOGA, MEDITATION <br>& MASSAGE <br> IN TIPPERARY</h1>
				</div> <!-- medium-9-->
			
				<div class="column medium-3 front-info">
					<div class="row collapse">
						<div id="latest-post" class="column small-12">
							<i class="fa fa-newspaper-o"></i>
							<a href="http://visiblesandbox.com/grainne/blog/"><h3>LATEST NEWS</h3></a>
							
						
								
								<?php query_posts('showposts=3'); ?>
								<?php $posts = get_posts('category_name=news&numberposts=3&offset=0'); foreach ($posts as $post) : start_wp(); ?>
								
								<div class="news-summary-item row collapse">
									<div class="column medium-3">
											<?php 
											if ( has_post_thumbnail() ) { 
												the_post_thumbnail( array(29, 29) );
											} 
											else { ?>
											
											
											
											<?php } ?>
									</div>
									<div class="column medium-9">
										<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
									</div>
									
								</div>
								
								<?php endforeach; ?>
						</div> <!-- latest post -->
							
							
					</div> <!-- row -->
				
					<div class="row collapse">
						<div id="bookings" class="column small-12">
							<i class="fa fa-calendar"></i>
						<h3><a href="http://visiblesandbox.com/grainne/schedule/">SCHEDULE</a></h3>
						</div>
					</div> <!-- row -->	
				</div> <!-- medium-3 -->
		</div>
		
		</div> <!-- medium-9 offset-3-->
							
		
	</section>
	
	
	
<!--
		<section id="services" class="row section">
			
			<ul class="small-block-grid-1 medium-block-grid-2"> 
				<li class="bucket pink-glass">
					<h2>YOGA</h2>
					<span class="bucket-bg clearfix">
						<img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-yoga.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<a href="http://www.visiblesandbox.com/grainne/yoga/"> Read More &rarr;</a></p>
					</span>
				</li>
				
				<li class="bucket red-glass">
					<h2>PREGNANCY</h2>
					<span class="bucket-bg clearfix"><img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-pregnancy.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam <a href="http://www.visiblesandbox.com/grainne/pregnancy-yoga/"> Read More &rarr;</a></p>
					</span>
					</a></li>
				
				
				<li class="bucket orange-glass">
					<h2>MEDITATION</h2>
					<span class="bucket-bg clearfix">
						<img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-meditation.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<a href="http://www.visiblesandbox.com/grainne/meditation/"> Read More &rarr;</a></p>
					</span>
						
					</a></li>
				
				<li class="bucket green-glass">
					<h2>MASSAGE</h2>
					<span class="bucket-bg clearfix">
						<img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-massage.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<a href="http://www.visiblesandbox.com/grainne/massage/"> Read More &rarr;</a></p>
					</span>
					</a></li>
			</ul>
		
	</section>
-->
	
	
	
	
	
	
	<section id="services" class="row section">
			
			<ul class="small-block-grid-1 medium-block-grid-2"> 
				<li class="bucket tri-drk-red">
					<h2>YOGA</h2>
					<span class="bucket-bg clearfix">
						<img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-yoga.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<a href="http://www.visiblesandbox.com/grainne/yoga/"> Read More &rarr;</a></p>
					</span>
				</li>
				
				<li class="bucket tri-red">
					<h2>PREGNANCY</h2>
					<span class="bucket-bg clearfix"><img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-pregnancy.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam <a href="http://www.visiblesandbox.com/grainne/pregnancy-yoga/"> Read More &rarr;</a></p>
					</span>
					</a></li>
				
				
				<li class="bucket tri-blue">
					<h2>MEDITATION</h2>
					<span class="bucket-bg clearfix">
						<img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-meditation.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<a href="http://www.visiblesandbox.com/grainne/meditation/"> Read More &rarr;</a></p>
					</span>
						
					</a></li>
				
				<li class="bucket tri-drk-green">
					<h2>MASSAGE</h2>
					<span class="bucket-bg clearfix">
						<img src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/bucket-massage.png">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<a href="http://www.visiblesandbox.com/grainne/massage/"> Read More &rarr;</a></p>
					</span>
					</a></li>
			</ul>
		
	</section>
	<section id="welcome" class="comp-purple-glass section">
		<div class="row">
			<h2>Grainne McLaughlin</h2>
		</div>
		<div class="row">
			<div class="small-12 column">
				<div  id="welcome-txt">	
						<p>I think this should be about you and your credentials as the above sections outline what you offer. I offer yoga and meditation classes suitable for all age groups, genders and abilities. This classical style of yoga encourages a meditative and spiritual approach to yoga inspired by the Bihar School of Yoga, India. Practices include physical yoga postures, movement, breathing techniques, meditation and concentration practices including Yoga Nidra, a deeply restorative practice.</p>	
				</div>
			</div>
<!--
			<div class="column medium-4">
				<img class="border" src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/gra2.jpg">
			</div>
-->
			
		</div>

	</section>
<!--
	<section id="schedule" class="section comp-yellow-glass">
		
			<?php get_template_part(schedule) ?>
		</section>
-->
	<?php get_footer();?>
	
	
	