<?php
/*
Template Name: Home
*/
?>

<?php get_header(home); ?>
	<div id="homepage">
	<section id="logo" class="row">
					
						<div id="title"><h1 class="home-title">Grainne McLaughlin <br>Yoga</h1></div>
						<div id="yantra"><img src="http://www.visiblesandbox.com/grainne/wp-content/uploads/2015/11/sri-yantra-160.png"></div>
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
	
<!-- 	<div class="tri-drk-red"><h1>ijysdxdusdyg sdjy kj  ulcljsbjxckxjc xd <br> kdzh dkjysdbiuydiubydbku</h1></div> -->
	<section id="hero" class="row section collapse">
		<div class="column medium-9 medium-offset-3 lt-green-glass">
			<div class="row collapse">
				<div class="column medium-9">
					<h1>YOGA, MEDITATION <br>& MASSAGE <br> IN TIPPERARY</h1>
				</div> <!-- medium-9-->
			
				<div class="column medium-3 front-info">
					<div class="row collapse">
						<div id="latest-post" class="column small-12">
							<i class="fa fa-newspaper-o"></i>
							<ul>
								<?php
									$args = array( 'numberposts' => '1' );
									$recent_posts = wp_get_recent_posts( $args );
									foreach( $recent_posts as $recent ){
										echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
									}
								?>
							</ul>
						</div>
					</div> <!-- row -->
						<div class="row collapse">
							<div id="bookings" class="column small-12">
							<div><a href="#"><h2>Book Now</h2></a></div>
							<i class="fa fa-calendar"></i>
							
						</div>
					</div> <!-- row -->	
				</div> <!-- medium-3 -->
		</div>
		<div class="flower-orange-glass contact-head">
			<a href="tel:00353868518321">086 851 8321</a><br>
			<a href="mailto:grainne@yoga.ie">grainne@grainnemcloughlin.ie</a>
		</div>
		</div> <!-- medium-9 offset-3-->
							
		
	</section>
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
	<section id="welcome" class="purple-glass section">
		<div class="row">
			<div class="medium-6 column" id="welcome-txt">
						<p>I offer yoga and meditation classes suitable for all age groups, genders and abilities. This classical style of yoga encourages a meditative and spiritual approach to yoga inspired by the Bihar School of Yoga, India. Practices include physical yoga postures, movement, breathing techniques, meditation and concentration practices including Yoga Nidra, a deeply restorative practice.</p>	
			</div>
			<div class="column medium-4">
				<img class="border" src="http://visiblesandbox.com/grainne/wp-content/uploads/2015/11/gra2.jpg">
			</div>
			
		</div>

	</section>
	<section class="schedule section dark-glass">
		
			<?php get_template_part(schedule) ?>
		</section>
	
	<section id="trust" class="section">
		<div class="trust-txt">
			<q>Move from a place of knowing within you rather than as a result of adaptation to outer experience. Let go of your assumptions and need to control life’s creative process.</q>
			
			<cite>Swami Niranjananda Saraswati</cite>
		</div>

	</section>
	</div> <!-- frontpage -->
	