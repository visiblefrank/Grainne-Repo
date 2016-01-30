<?php
/*	 Plugin setting panel
 *   Version: 1.0
 *   Author: SB Themes
 *   Profile: http://codecanyon.net/user/sbthemes?ref=sbthemes
 */


/**
 * Generate form
 */
function sbsa_enqueue_scripts($hook) {
	//Prevent adding scripts if page is not plugin settings page
	$add_scripts_pages = array('settings_page_sb-scroll-animation');
	if( !in_array($hook ,$add_scripts_pages) ) {
        return;
	}
	//Including scripts/styles for admin settings panel
	wp_enqueue_style('sbsa-admin-style', SBSA_DIR_URL.'/assets/css/sbsa-admin.css', array(), SBSA_PLUGIN_VERSION);
	wp_enqueue_script('jquery-masonry');
	
}
add_action( 'admin_enqueue_scripts', 'sbsa_enqueue_scripts');
function sbsa_render_form() {
	global $wpdb;
	$nonce_action = 'sbsa-save-settings';
	$global_nonce_action = 'sbsa-global-settings';
	$import_nonce_action = 'sbsa-import-settings';
	
	
	//Import settings
	if(isset($_POST['action']) && $_POST['action'] == 'sbsa_import_settings') {
		$nonce = $_POST['sbsa_import_nonce'];
		//Nonce Verification
		if(wp_verify_nonce($nonce, $import_nonce_action)) {
			$settings = trim($_POST['import_settings']);
			$sbsa_settings = unserialize(base64_decode($settings));
			if(is_array($sbsa_settings)) {
				update_option('sbsa_settings', $sbsa_settings);
				wp_redirect('?page=sb-scroll-animation&type=1&msg=Settings+imported.');
			} else {
				wp_redirect('?page=sb-scroll-animation&type=0&msg=Invalid+settings.');
			}
		} else {
			wp_die('Invalid Nonce...');
		}
		
	}
	
	//Saving Global settings
	if(isset($_POST['action']) && $_POST['action'] == 'global_plugin_settings') {
		$nonce = $_POST['sbsa_global_nonce'];
		//Nonce Verification
		if(wp_verify_nonce($nonce, $global_nonce_action)) {
			$plugin_status = 0;
			if(isset($_POST['plugin_status']))
				$plugin_status = 1;
			
			$sbsa_global_settings = array(
				'plugin_status'		=>	$plugin_status
			);
			
			update_option('sbsa_global_settings', $sbsa_global_settings);
			$msg = 'Plugin+Disabled.';
			if($plugin_status == 1)
				$msg = 'Plugin+Enabled.';
			wp_redirect('?page=sb-scroll-animation&type=1&msg='.$msg);
			
		} else {
			wp_die('Invalid Nonce...');
		}
		
	}
	
	//Saving settings
	if(isset($_POST['action']) && $_POST['action'] == 'sbsa_save_settings') {
		$nonce = $_POST['sbsa_nonce'];
		//Nonce Verification
		if(wp_verify_nonce($nonce, $nonce_action)) {
			
			$jquery_selectors = $_POST['jquery_selector'];
			$animations = $_POST['animation'];
			$animation_time = $_POST['animation_time'];
			$animation_delay = $_POST['animation_delay'];
			$settings = array();
			
			if(count($jquery_selectors) > 0) {
				$counter = 0;
				foreach($jquery_selectors as $jquery_selector) {
					$jquery_selector = trim($jquery_selector);
					$jquery_selector = trim($jquery_selector,',');
					$jquery_selector = trim($jquery_selector);
					
					if($jquery_selector == '') {
						$counter++;
						continue;
					}
					$settings[] = array(
						'selector'			=>	$jquery_selector,
						'animation'			=>	$animations[$counter],
						'animation_time'	=>	$animation_time[$counter],
						'animation_delay'	=>	$animation_delay[$counter],
					);
					$counter++;
				}
			}
			update_option('sbsa_settings', $settings);
			wp_redirect('?page=sb-scroll-animation&type=1&msg=Settings+saved.');
			
		} else {
			wp_die('Invalid Nonce...');
		}
		
	}
	
	$settings = get_option('sbsa_settings');
	
	//Animation Styles Array
	$animations = array();
	
	$animations['Attention Seekers'] = array(
		'bounce'		=>	'bounce',
		'flash'			=>	'flash',
		'pulse'			=>	'pulse',
		'rubberBand'	=>	'rubberBand',
		'shake'			=>	'shake',
		'swing'			=>	'swing',
		'tada'			=>	'tada',
		'bounce'		=>	'bounce',
		'wobble'		=>	'wobble'
	);
	
	$animations['Bouncing Entrances'] = array(
		'bounceIn'		=>	'bounceIn',
		'bounceInDown'	=>	'bounceInDown',
		'bounceInLeft'	=>	'bounceInLeft',
		'bounceInRight'	=>	'bounceInRight',
		'bounceInUp'	=>	'bounceInUp'
	);
	
	$animations['Bouncing Exits'] = array(
		'bounceOut'			=>	'bounceOut',
		'bounceOutDown'		=>	'bounceOutDown',
		'bounceOutLeft'		=>	'bounceOutLeft',
		'bounceOutRight'	=>	'bounceOutRight',
		'bounceOutUp'		=>	'bounceOutUp'
	);
	
	$animations['Fading Entrances'] = array(
		'fadeIn'			=>	'fadeIn',
		'fadeInDown'		=>	'fadeInDown',
		'fadeInDownBig'		=>	'fadeInDownBig',
		'fadeInLeft'		=>	'fadeInLeft',
		'fadeInLeftBig'		=>	'fadeInLeftBig',
		'fadeInRight'		=>	'fadeInRight',
		'fadeInRightBig'	=>	'fadeInRightBig',
		'fadeInUp'			=>	'fadeInUp',
		'fadeInUpBig'		=>	'fadeInUpBig'
	);
	
	$animations['Fading Exits'] = array(
		'fadeOut'			=>	'fadeOut',
		'fadeOutDown'		=>	'fadeOutDown',
		'fadeOutDownBig'	=>	'fadeOutDownBig',
		'fadeOutLeft'		=>	'fadeOutLeft',
		'fadeOutLeftBig'	=>	'fadeOutLeftBig',
		'fadeOutRight'		=>	'fadeOutRight',
		'fadeOutRightBig'	=>	'fadeOutRightBig',
		'fadeOutUp'			=>	'fadeOutUp',
		'fadeOutUpBig'		=>	'fadeOutUpBig'
	);
	
	$animations['Flippers'] = array(
		'flip'	=>	'flip',
		'flipInX'	=>	'flipInX',
		'flipInY'	=>	'flipInY',
		'flipOutX'	=>	'flipOutX',
		'flipOutY'	=>	'flipOutY'
	);
	
	$animations['Lightspeed'] = array(
		'lightSpeedIn'	=>	'lightSpeedIn',
		'lightSpeedOut'	=>	'lightSpeedOut'
	);
	
	$animations['Rotating Entrances'] = array(
		'rotateIn'			=>	'rotateIn',
		'rotateInDownLeft'	=>	'rotateInDownLeft',
		'rotateInDownRight'	=>	'rotateInDownRight',
		'rotateInUpLeft'	=>	'rotateInUpLeft',
		'rotateInUpRight'	=>	'rotateInUpRight'
	);
	
	$animations['Rotating Exits'] = array(
		'rotateOut'				=>	'rotateOut',
		'rotateOutDownLeft'		=>	'rotateOutDownLeft',
		'rotateOutDownRight'	=>	'rotateOutDownRight',
		'rotateOutUpLeft'		=>	'rotateOutUpLeft',
		'rotateOutUpRight'		=>	'rotateOutUpRight'
	);
	
	$animations['Specials'] = array(
		'hinge'		=>	'hinge',
		'rollIn'	=>	'rollIn',
		'rollOut'	=>	'rollOut'
	);
	
	$animations['Zoom Entrances'] = array(
		'zoomIn'		=>	'zoomIn',
		'zoomInDown'	=>	'zoomInDown',
		'zoomInLeft'	=>	'zoomInLeft',
		'zoomInRight'	=>	'zoomInRight',
		'zoomInUp'		=>	'zoomInUp'
	);
	
	$animations['Zoom Exits'] = array(
		'zoomOut'		=>	'zoomOut',
		'zoomOutDown'	=>	'zoomOutDown',
		'zoomOutLeft'	=>	'zoomOutLeft',
		'zoomOutRight'	=>	'zoomOutRight',
		'zoomOutUp'		=>	'zoomOutUp'
	);
	
	$animations['Magic Effects'] = array(
		'magic'			=>	'magic',
		'twisterInDown'	=>	'twisterInDown',
		'twisterInUp'	=>	'twisterInUp',
		'swap'			=>	'swap'
	);
	
	$animations['Bling'] = array(
		'puffIn'	=>	'puffIn',
		'puffOut'	=>	'puffOut',
		'vanishIn'	=>	'vanishIn',
		'vanishOut'	=>	'vanishOut'
	);
	
	$animations['Static Effects'] = array(
		'openDownLeft'			=>	'openDownLeft',
		'openDownRight'			=>	'openDownRight',
		'openUpLeft'			=>	'openUpLeft',
		'openUpRight'			=>	'openUpRight',
		'openDownLeftRetourn'	=>	'openDownLeftRetourn',
		'openDownRightRetourn'	=>	'openDownRightRetourn',
		'openUpLeftRetourn'		=>	'openUpLeftRetourn',
		'openUpRightRetourn'	=>	'openUpRightRetourn'
	);
	
	$animations['Static Effects Out'] = array(
		'openDownLeftOut'	=>	'openDownLeftOut',
		'openDownRightOut'	=>	'openDownRightOut',
		'openUpLeftOut'		=>	'openUpLeftOut',
		'openUpRightOut'	=>	'openUpRightOut'
	);
	
	$animations['Perspective'] = array(
		'perspectiveDown'			=>	'perspectiveDown',
		'perspectiveUp'				=>	'perspectiveUp',
		'perspectiveLeft'			=>	'perspectiveLeft',
		'perspectiveRight'			=>	'perspectiveRight',
		'perspectiveDownRetourn'	=>	'perspectiveDownRetourn',
		'perspectiveUpRetourn'		=>	'perspectiveUpRetourn',
		'perspectiveLeftRetourn'	=>	'perspectiveLeftRetourn',
		'perspectiveRightRetourn'	=>	'perspectiveRightRetourn'
	);
	
	$animations['Rotate'] = array(
		'rotateDown'	=>	'rotateDown',
		'rotateUp'		=>	'rotateUp',
		'rotateLeft'	=>	'rotateLeft',
		'rotateRight'	=>	'rotateRight'
	);
	
	$animations['Slide'] = array(
		'slideDown'			=>	'slideDown',
		'slideUp'			=>	'slideUp',
		'slideLeft'			=>	'slideLeft',
		'slideRight'		=>	'slideRight',
		'slideDownRetourn'	=>	'slideDownRetourn',
		'slideUpRetourn'	=>	'slideUpRetourn',
		'slideLeftRetourn'	=>	'slideLeftRetourn',
		'slideRightRetourn'	=>	'slideRightRetourn'
	);
	
	$animations['Math'] = array(
		'swashOut'		=>	'swashOut',
		'swashIn'		=>	'swashIn',
		'foolishOut'	=>	'foolishOut',
		'foolishIn'		=>	'foolishIn',
		'holeOut'		=>	'holeOut'
	);
	
	$animations['Tin'] = array(
		'tinRightOut'	=>	'tinRightOut',
		'tinLeftOut'	=>	'tinLeftOut',
		'tinUpOut'		=>	'tinUpOut',
		'tinDownOut'	=>	'tinDownOut',
		'tinRightIn'	=>	'tinRightIn',
		'tinLeftIn'		=>	'tinLeftIn',
		'tinUpIn'		=>	'tinUpIn',
		'tinDownIn'		=>	'tinDownIn'
	);
	
	$animations['Bomb'] = array(
		'bombRightOut'	=>	'bombRightOut',
		'bombLeftOut'	=>	'bombLeftOut'
	);
	
	$animations['Boing'] = array(
		'boingInUp'		=>	'boingInUp',
		'boingOutDown'	=>	'boingOutDown'
	);
	
	$animations['On the Space'] = array(
		'spaceOutUp'	=>	'spaceOutUp',
		'spaceOutRight'	=>	'spaceOutRight',
		'spaceOutDown'	=>	'spaceOutDown',
		'spaceOutLeft'	=>	'spaceOutLeft',
		'spaceInUp'		=>	'spaceInUp',
		'spaceInRight'	=>	'spaceInRight',
		'spaceInDown'	=>	'spaceInDown',
		'spaceInLeft'	=>	'spaceInLeft'
	);
	
	?>
    <div class="wrap" id="sbsa-wrapper">
        <h2 class="title">
        	<img class="title-icon" src="<?php echo SBSA_DIR_URL; ?>/assets/img/logo-icon.png" alt="" /> SB Content Animation on Scroll - WordPress Plugin
            <a href="#faq-help-section" class="button alignright">Help</a>
            <a href="#import-export-section" class="button alignright">Import / Export</a>
        </h2>
        
        <div class="clear"></div>
        <?php if(isset($_GET['msg'])) { ?>
        <div class="<?php if(isset($_GET['type']) && $_GET['type'] == 0) { echo 'error'; } ?> updated below-h2"><p><strong><?php echo $_GET['msg']; ?></strong></p></div>
        <?php } ?>
        
        <div id="dashboard-widgets-wrap">
        	<div id="dashboard-widgets" class="metabox-holder">
            	<form method="post" action="<?php echo admin_url('/options-general.php?page=sb-scroll-animation'); ?>">
            		<div class="meta-box-sortables">
                        <div class="postbox">
                            <h3 class="hndle"><span>Global Settings</span></h3>
                            <div class="inside">
                                <div class="main">
                                	<?php $sbsa_global_settings = get_option('sbsa_global_settings'); ?>
                                    <input <?php checked($sbsa_global_settings['plugin_status'], 1); ?> value="1" type="checkbox" name="plugin_status" id="plugin_status" /><label for="plugin_status">Enable Plugin</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php wp_nonce_field($global_nonce_action, 'sbsa_global_nonce'); ?>
				                    <input type="hidden" name="action" value="global_plugin_settings" />
                                    <input type="submit" class="button-primary sb-btn" value="Save" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <form method="post" action="<?php echo admin_url('/options-general.php?page=sb-scroll-animation'); ?>">
                    <div class="meta-box-sortables">
                        <div class="postbox">
                        <h3 class="hndle"><span>Settings</span></h3>
                        <div class="inside">
                            <div class="main">
                                <table class="sbsa-selector-settings">
                                    <thead>
                                        <tr>
                                            <td>
                                                <strong>jQuery Selector</strong>
                                                <p class="description">Use any <a target="_blank" href="http://api.jquery.com/category/selectors/">jQuery selector</a>.<br />You can also use comma separated list for multiple selector.</p>
                                            </td>
                                            <td class="animation-style"><strong>Animation Style</strong></td>
                                            <td class="animation-time">
                                            	<strong>Animation Time (In Seconds)</strong>
                                                <p class="description">Any positive float value.</p>
                                            </td>
                                            <td class="animation-delay">
                                            	<strong>Animation Delay (In Seconds)</strong>
                                                <p class="description">Any positive float value.</p>
                                            </td>
                                        </tr>
                                        <tr><td><hr /></td><td><hr /></td><td><hr /></td><td><hr /></td></tr>
                                    </thead>
                                    <tbody>
                                        <tr class="sbsa-sample-row">
                                            <td>
                                                <input name="jquery_selector[]" type="text" class="regular-text" />
                                            </td>
                                            <td>
                                                <select name="animation[]">
                                                    <option value="none">None</option>
                                                    <?php
                                                        foreach($animations as $animation_key => $animation) {
                                                            echo '<optgroup label="'.$animation_key.'">';
                                                            foreach($animation as $anim_key => $anim)
                                                            echo '<option value="'.$anim_key.'">'.$anim.'</option>';
                                                            echo '</optgroup>';
                                                        }
                                                    ?>
                                                    </select>
                                            </td>
                                            <td class="animation-time"><input type="text" name="animation_time[]" value="1" /></td>
                                            <td class="animation-delay"><input type="text" name="animation_delay[]" value="0" /></td>
                                            <td><input type="button" value="X" class="button delete-row" /></td>
                                        </tr>
                                        
                                        <?php
											$no_animation = 1;
                                            if(is_array($settings) && count($settings) > 0) {
                                                foreach($settings as $setting) {
													if(!isset($setting['animation_delay'])) {
														$setting['animation_delay'] = 0;
													}
													?>
                                                    <tr>
                                                        <td>
                                                            <input name="jquery_selector[]" type="text" class="regular-text" value="<?php echo sbsa_display_field($setting['selector']); ?>" />
                                                        </td>
                                                        <td>
                                                            <select name="animation[]">
                                                                <option <?php selected($setting['animation'], 'none'); ?> value="none">None</option>
                                                                <?php foreach($animations as $animation_key => $animation) { ?>
                                                                        <optgroup label="<?php echo $animation_key;?>">
                                                                            <?php foreach($animation as $anim_key => $anim) { ?>
                                                                                <option <?php selected($setting['animation'], $anim_key); ?> value="<?php echo $anim_key; ?>"><?php echo $anim; ?></option>
                                                                            <?php } ?>
                                                                        </optgroup>
                                                                 <?php } ?>
                                                                </select>
                                                        </td>
                                                        <td class="animation-time"><input type="text" name="animation_time[]" value="<?php echo sbsa_display_field($setting['animation_time']); ?>" /></td>
                                                        <td class="animation-delay"><input type="text" name="animation_delay[]" value="<?php echo sbsa_display_field($setting['animation_delay']); ?>" /></td>
                                                        <td><input type="button" value="X" class="button delete-row" /></td>
                                                    </tr><?php
                                                }
                                            } else {
												$no_animation = 0;
											}
                                        ?>
                                        <tr class="no-animation-row" style=" <?php if($no_animation == 1) { echo 'display:none'; } ?>"><td colspan="3"><big><em>No animation available. Click <a href="javascript:" class="add-new-row">Add New</a></strong> to add animation or <a href="#import-export-section">Import Animation</a></strong></em></big></td></tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <input type="button" class="button-primary sb-btn add-new-row" value="+ Add New" />
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php wp_nonce_field($nonce_action, 'sbsa_nonce'); ?>
                    <input type="hidden" name="action" value="sbsa_save_settings" />
                    <input type="submit" class="button-primary sb-btn save-changes" value="Save Settings" />
                </div>
            </form>
            <div class="clear"></div><br /><br /><br />
            
            <div class="meta-box-sortables">
                <div class="postbox" id="import-export-section">
                    <h3 class="hndle"><span>Import & Export Settings</span></h3>
                    <div class="inside">
                        <div class="main">
                        	<div class="import-wrapper">
                            	<h2>Export Settings</h2>
                                <p class="description">Copy below settings. You can import this settings in future.</p>
                                <?php
									$export_settings = get_option('sbsa_settings');
									if(is_array($export_settings) && count($export_settings) > 0)
	                                	$export_settings = base64_encode(serialize(get_option('sbsa_settings')));
									else
										$export_settings = '';
								?>
                            	<textarea rows="5" readonly="readonly" onclick="this.select();" onfocus="this.select();"><?php echo $export_settings; ?></textarea>
                            </div>
                            <div class="export-wrapper">
	                            <h2>Import Settings</h2>
                                <p class="description">Paste settings here. <u><strong>Important Note: </strong>After importing new settings you will loss current settings.</u></p>
                                <form method="post" id="form-import-settings" action="<?php echo admin_url('/options-general.php?page=sb-scroll-animation'); ?>">
	                            	<textarea rows="5" id="import_settings" name="import_settings"></textarea>
                                    <?php wp_nonce_field($import_nonce_action, 'sbsa_import_nonce'); ?>
                                    <input type="hidden" name="action" value="sbsa_import_settings" />
    	                            <input type="submit" value="Import Animation Settings" class="button-primary sb-btn import-btn" />
                                </form>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clear"></div><br /><br /><br />
            <div class="meta-box-sortables">
                <div class="postbox" id="faq-help-section">
                    <h3 class="hndle"><span>Help & FAQs</span></h3>
                    <div class="inside">
                        <div class="main">
                        	<h3>How to add animation direct in theme or template file?</h2>
                            <p>Here are vailable attributes to add animation direct to theme template or editor code.</p>
                            <ul>
                            	<li><strong class="highlight">sbsa-animation</strong>&nbsp;&nbsp;&nbsp;&nbsp;- add this attribute to define animation style <strong>(Required)</strong></li>
                                <li><strong class="highlight">sbsa-time</strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;- add this attribute to define animation time in seconds <strong>(Optional)</strong>. Default: 1</li>
                                <li><strong class="highlight">sbsa-delay</strong>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;- add this attribute to set animation delay in seconds <strong>(Optional)</strong>. Default: 0</li>
                            </ul>
                            <p><strong>Examples: </strong></p>
	                       	<p><code>&lt;div class="some_class_here" <strong class="highlight"><u>sbsa-animation="lightSpeedIn"</u></strong>&gt;&lt;/div&gt;</code></p>
                            <p><code>&lt;p class="some_class_here" <strong class="highlight"><u>sbsa-animation="rotateOutDownLeft"</u></strong> <strong class="highlight"><u>sbsa-time="1.5"</u></strong> <strong class="highlight"><u>sbsa-delay="0.5"</u></strong>&gt;&lt;/p&gt;</code></p>
                            <p>
                            	<code>
	                            	&lt;ul&gt;<br />
                                    	&nbsp;&nbsp;&nbsp;&nbsp;&lt;li <strong class="highlight"><u>sbsa-animation="bounceInLeft"</u></strong> <strong class="highlight"><u>sbsa-time="1.5"</u></strong> <strong class="highlight"><u>sbsa-delay="0"</u></strong>&gt;Some Text Here...&lt;/li&gt;<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li <strong class="highlight"><u>sbsa-animation="bounceInRight"</u></strong> <strong class="highlight"><u>sbsa-time="2.5"</u></strong> <strong class="highlight"><u>sbsa-delay="0.5"</u></strong>&gt;Some Text Here...&lt;/li&gt;<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li <strong class="highlight"><u>sbsa-animation="fadeInDown"</u></strong> <strong class="highlight"><u>sbsa-time="2"</u></strong> <strong class="highlight"><u>sbsa-delay="1"</u></strong>&gt;Some Text Here...&lt;/li&gt;<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li <strong class="highlight"><u>sbsa-animation="fadeInDownBig"</u></strong> <strong class="highlight"><u>sbsa-time="0.5"</u></strong> <strong class="highlight"><u>sbsa-delay="1.5"</u></strong>&gt;Some Text Here...&lt;/li&gt;<br />
    	                            &lt;/ul&gt;
                                </code>
                            </p>
                            <hr />
                            <h3>List of all available animation styles:</h3>
                            <p>Here is list of all available styles. You can use any of below in <strong class="highlight"><u>sbsa-animation</u></strong> field.</p>
                            <ul class="parent available-animation-styles">
                            	<?php foreach($animations as $animation_key => $animation) { ?>
                                        <li>
                                        	<h4><?php echo $animation_key;?></h4>
                                            <ul>
												<?php foreach($animation as $anim_key => $anim) { ?>
        	                                            <li><?php echo $anim_key; ?></li>
													<?php } ?>
                                            </ul>
                                        </li>
                                 	<?php } ?>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="meta-box-sortables">
                <div class="postbox" id="recommended-plugins">
                    <h3 class="hndle"><span>Recommended Plugins</span></h3>
                    <div class="inside">
                        <div class="main">
                        	<div class="plugin-row">
                                <div class="plugin-content plugin-half">
                                	<h2>SB Multilingual Responsive Google Map with Styles</h2>
                                    <p>This is a google maps WordPress plugin to generate fully customized responsive google maps in your local language. Unlimited marker pins available. 100+ different styles(skin) available and counting.</p>
                                    <p><a target="_blank" title="View Demo" href="http://demo.sbthemes.com/responsive-google-map-plugin-demo/">Demo</a> | <a target="_blank" title="Download Plugin" href="http://codecanyon.net/item/sb-multilingual-responsive-google-map-with-styles/8766060?ref=sbthemes">Download</a></p>
                                </div>
                                <div class="plugin-thumbnail plugin-half">
                                	<a target="_blank" title="View Plugin Details" href="http://codecanyon.net/item/sb-multilingual-responsive-google-map-with-styles/8766060?ref=sbthemes">
		                                <img src="<?php echo SBSA_DIR_URL; ?>/assets/img/google-map.jpg" alt="Responsive Google Map - WordPress Plugin" />
                                    </a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<script type="text/javascript">
		(function($){
			$(document).ready(function() {
				$('.add-new-row').click(function() {
					$('.no-animation-row').hide();
					var data = '<tr>'+$('tr.sbsa-sample-row').html()+'</tr>';
					$('.sbsa-selector-settings tbody').append(data);
				});
				
				$('.available-animation-styles').masonry({
					columnWidth: 100,
					gutter: 10,
					itemSelector: '.available-animation-styles > li'
				});
			});
			
			$('body').on('click', '.delete-row', function() {
				if(confirm('Are you really want to delete this record?')) {
					$(this).closest('tr').remove();
					if($('.sbsa-selector-settings tbody tr').length == 2)
						$('.no-animation-row').show();
					return;
				}
				return false;
			});
			
			$('#form-import-settings').submit(function() {
				if(confirm('Are you about to overwriting current settings.\nCurrent settings will be lost.\nAre you ready to import new settings?'))
					return true;
				return false;
			});
			
		})(jQuery);
	</script>
	
	<?php
}
